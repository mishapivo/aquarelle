(function() {
  "use strict";

  function stretchSection(section) {
    var width = document.getElementById('content').clientWidth;
    var sectionWidth = section.clientWidth;

    if (width <= sectionWidth) {
      return;
    }

    var margin = (width - sectionWidth) / 2;

    // Add content wrapper.
    var contentWrapper = section.getElementsByClassName('stretch-section-content');
    if (!contentWrapper.length) {
      return;
    }

    contentWrapper = contentWrapper[0];

    contentWrapper.style.marginLeft = parseInt(-1 * margin) + "px";
    contentWrapper.style.marginRight = parseInt(-1 * margin) + "px";
  }

  document.onready = function() {
    var sections = document.getElementsByClassName('stretch-section');
    if (!sections) {
      return;
    }

    for (var i = 0; i < sections.length; i++) {
      stretchSection(sections[i]);
    }

    window.onresize = function() {
      for (var i = 0; i < sections.length; i++) {
        stretchSection(sections[i]);
      }
    }
  }
})();
