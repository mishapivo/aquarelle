/**
 * Scripts for Front-End customizer
 *
 */
( function( $ ) {
    var api = wp.customize;

    // Site title and description.
    api( 'blogname', function( value ) {
        value.bind( function( to ) {
            $( '.site-title a' ).html( to );
        });
    });

    api( 'blogdescription', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).html( to );
        });
    });

    api( 'auxin_user_custom_css', function( value ) {
        // Remove the custom css file from the page (since the custom css will be added to page instantly)
        $('#auxin-custom-css').remove();

        var styleDomId = 'auxin-customizer-css-auxin_user_custom_css';
        style = $( '#' + styleDomId );
        if ( ! style.length ) {
            style = $( 'head' ).append( '<style type=\"text/css\" id=\"' + styleDomId + '\" />' )
                               .find( '#' + styleDomId );
        }
        // append the custom styles on start if this is the setting for user_custom_css
        style.html(  wp.customize.settings.values.auxin_user_custom_css );
    });

} )( jQuery );



/**
 * Search for a value in an array.
 */
function inArray( needle, haystack ) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}

/**
 * Specifies whether the value is true or not.
 *
 * @param  mixed variable    The variable to check whether is true or not
 * @return bool              Returns true or false
 */
function auxinIsTrue( variable ) {
    if( typeof(variable) === "boolean" ){
        return variable;
    }

    if( typeof(variable) === "string" ){
        variable = variable.toLowerCase();
        if( inArray( variable, ['yes', 'on', 'true', 'checked'] ) ){
            return true;
        }
    }
    // if is nummeric
    if ( !isNaN(parseFloat(variable)) && isFinite(variable) ) {
        return Boolean(variable);
    }

    return false;
}


/**
 * Parse CSS for Group customizer controls
 *
 * @param  string  data      JSON data
 * @param  string  selector  dom selector
 *
 * @return string            Generated CSS
 */
function parseGroupStyles( data, selector ){

    var stylesObj, // stores styles for various breakpoints
        font;      // stores the selected google font

    var _init = function(){
        // Reset the variables
        stylesObj = {desktop:""};
        font = "";

        // start parsing styles
        _crawlRawData( data );
        // Maybe load a google font
        _loadFont();
    };

    var _parseJSON = function( data ){
        return JSON.parse( data );
    };

    var _crawlRawData = function( data ){
        data = _parseJSON( data );

        for (panel in data) {
            if (data.hasOwnProperty(panel)) {
                for (cssProrp in data[panel]) {
                    if (data[panel].hasOwnProperty(cssProrp)) {
                        if( data[panel][cssProrp] && "none" != data[panel][cssProrp] ){
                            if( data[panel][cssProrp] !== null && typeof data[panel][cssProrp] === 'object' ){
                                _collectResponsiveUnits( data[panel][cssProrp], cssProrp );
                            } else if( cssProrp ) {
                                stylesObj["desktop"] += _getRuleString( cssProrp, data[panel][cssProrp] );
                            }
                        }
                    }
                }
            }
        }
    };

    var _getRuleString = function( prop, value ){
        if( prop == "font-family" ){
            font    = value;
            value   = value.substr(0, value.indexOf(':'));
            value   = "'" + value + "'";
        }
        return  prop + ":" + value + ";";
    };

    var _loadFont = function(){
        if( font ){
            var link = document.createElement('link');
            link.setAttribute('rel', 'stylesheet');
            link.setAttribute('type', 'text/css');
            link.setAttribute('href', "//fonts.googleapis.com/css?family=" + font.split(' ').join('+') );
            document.head.appendChild(link);
        }
    };

    var _collectResponsiveUnits = function( breakpoints, propertyName ){
        var breakStyle  = '';

        for (bp in breakpoints) {
            if (breakpoints.hasOwnProperty(bp)) {
                if( breakpoints[bp].value && breakpoints[bp].unit ){
                    breakStyle = propertyName + ":" + breakpoints[bp].value + breakpoints[bp].unit + ";";
                    stylesObj[bp] = stylesObj.hasOwnProperty(bp) ? stylesObj[bp] + breakStyle : breakStyle;
                }
            }
        }
    };

    var getCSS = function(){
        var result = [],
            node = '';

        for (bp in stylesObj) {
            if (stylesObj.hasOwnProperty(bp)) {
                node = selector + "{ " + stylesObj[bp] + " } "
                result.push( ( "desktop" === bp ? node : "@media(max-width:"+ bp +"px){ " + node + "} } " ) );
            }
        }
        result.reverse();

        return result.join("\n");
    };


    _init();

    return getCSS();
}



function auxinGetSelectorStyles( value, selector ){
    if( (value.charAt(0) == "{") && value.indexOf( "typography" ) !== -1 ){
        return parseGroupStyles( value, selector );
    }
    return selector.split('{{VALUE}}').join( value );
}


/**
 * jQuery alterClass plugin             | Copyright (c) 2011 Pete Boere (the-echoplex.net)
 * Free under terms of the MIT license  | https://gist.github.com/peteboere/1517285
 */
!function(s){s.fn.alterClass=function(a,e){var r=this;if(-1===a.indexOf("*"))return r.removeClass(a),e?r.addClass(e):r;var n=new RegExp("\\s"+a.replace(/\*/g,"[A-Za-z0-9-_]+").split(" ").join("\\s|\\s")+"\\s","g");return r.each(function(a,e){for(var r=" "+e.className+" ";n.test(r);)r=r.replace(n," ");e.className=s.trim(r)}),e?r.addClass(e):r};s.fn.auxToggle=function(a){this.toggle(auxinIsTrue(a));}}(jQuery);
