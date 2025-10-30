document.addEventListener('DOMContentLoaded', function () {
  var form = document.getElementById('property-search-form');
  if (!form) return;

  var modeSelect = document.getElementById('search-mode');
  var city = document.getElementById('city');
  var ptype = document.getElementById('ptype');
  var tplCityBuy = document.getElementById('tpl-city-buy');
  var tplCityRent = document.getElementById('tpl-city-rent');
  var tplTypeBuy = document.getElementById('tpl-ptype-buy');
  var tplTypeRent = document.getElementById('tpl-ptype-rent');

  function cleanupTemplateNiceSelect() {
    var templates = document.querySelectorAll('.template-select');
    templates.forEach(function (sel) {
      var next = sel.nextElementSibling;
      while (next && next.classList && next.classList.contains('nice-select')) {
        var toRemove = next;
        next = next.nextElementSibling;
        toRemove.parentNode.removeChild(toRemove);
      }
    });
  }

  // Guard against late plugin initializations creating wrappers for templates
  try {
    var container = document.querySelector('.search-field-section');
    if (container && window.MutationObserver) {
      var mo = new MutationObserver(function (mutations) {
        mutations.forEach(function (m) {
          m.addedNodes && Array.prototype.forEach.call(m.addedNodes, function (node) {
            if (node.nodeType === 1 && node.classList && node.classList.contains('nice-select')) {
              var prev = node.previousElementSibling;
              if (prev && prev.classList && prev.classList.contains('template-select')) {
                node.parentNode && node.parentNode.removeChild(node);
              }
            }
          });
        });
      });
      mo.observe(container, { childList: true, subtree: true });
    }
  } catch (e) { /* noop */ }

  function updateNiceSelect(selectEl) {
    try {
      if (window.jQuery && window.jQuery.fn && window.jQuery.fn.niceSelect) {
        var $ = window.jQuery;
        var $el = $(selectEl);
        // Initialize if not yet enhanced
        if (!$el.next('.nice-select').length) {
          $el.niceSelect();
        } else {
          $el.niceSelect('update');
        }
      }
    } catch (e) {
      // no-op if plugin not available
    }
  }

  function setOptions(target, template) {
    if (!target || !template) return;
    target.innerHTML = template.innerHTML;
    // Reset selection to placeholder (first option)
    target.selectedIndex = 0;
    updateNiceSelect(target);
  }

  function applyMode(mode) {
    var isRent = (mode === 'rent');

    // Switch form action
    form.action = isRent ? 'rent-flats-apartments-properties-near-you.php' : 'buy-flats-apartments-properties-near-you.php';

    // Populate visible selects from templates
    setOptions(city, isRent ? tplCityRent : tplCityBuy);
    setOptions(ptype, isRent ? tplTypeRent : tplTypeBuy);

    // Ensure templates don't produce visible wrappers
    cleanupTemplateNiceSelect();
  }

  // Initial state
  var initialMode = modeSelect ? modeSelect.value : 'buy';
  applyMode(initialMode);
  // Run cleanup again after load to catch late inits
  window.addEventListener('load', function () {
    cleanupTemplateNiceSelect();
    updateNiceSelect(city);
    updateNiceSelect(ptype);
  });

  // Handle changes
  if (modeSelect) {
    modeSelect.addEventListener('change', function () {
      applyMode(modeSelect.value);
    });
  }

  // Ensure correct state right before submit
  form.addEventListener('submit', function () {
    applyMode(modeSelect ? modeSelect.value : 'buy');
  });
});
