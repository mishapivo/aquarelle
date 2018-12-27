/**
 *
 *
 *  Materialize Template <http://wordpress.org>
 *
 *  By KRATZ Geoffrey AKA Jul6art AKA VanIllaSkype
 *  for VsWeb <https://vsweb.be>
 *
 *  https://vsweb.be
 *  admin@vsweb.be
 *
 *  Special thanks to Brynnlow
 *  for his contribution
 *
 *  It is free software; you can redistribute it and/or modify it under
 *  the terms of the GNU General Public License, either version 2
 *  of the License, or any later version.
 *
 *  For the full copyright and license information, please read the
 *  LICENSE.txt file that was distributed with this source code.
 *
 *  The flex one, in a flex world
 *
 *     __    __    ___            __    __    __   ____
 *     \ \  / /   / __|           \ \  /  \  / /  |  __\   __
 *      \ \/ / _  \__ \  _         \ \/ /\ \/ /   |  __|  |  _\
 *       \__/ (_) |___/ (_)         \__/  \__/    |  __/  |___/
 *
 *                    https://vsweb.be
 *
 */
jQuery(document).ready(function($){
    $('form label').parent().addClass('input-field');
    $('form input[type="text"], form input[type="password"], form input[type="email"]').each(function(){
        $(this).closest('p').prepend($(this));
        if($(this).attr("type") == "text") {
            $(this).before('<i class="material-icons prefix">perm_identity</i>');
        } else if($(this).attr("type") == "email") {
            $(this).before('<i class="material-icons prefix">email</i>');
        } else {
            $(this).before('<i class="material-icons prefix">lock</i>');
        }
    });
    $('form br').remove();
    $('form .button-primary').attr("class", "btn waves-effect waves-light right waves-input-wrapper");
});