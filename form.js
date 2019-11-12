document.addEventListener("DOMContentLoaded", function() {
  var elems = document.querySelectorAll("select");
  var instances = M.FormSelect.init(elems, { data: { text: null } });
});

document.addEventListener("DOMContentLoaded", function() {
  // Autocomplete
  const ac = document.querySelector(".autocomplete");
  M.Autocomplete.init(ac, {
    data: {
      Austria: null,
      Belgium: null,
      Bulgaria: null,
      Croatia: null,
      Cyprus: null,
      "Czech Republic": null,
      Denmark: null,
      Estonia: null,
      Finland: null,
      France: null,
      Germany: null,
      Greece: null,
      Hungary: null,
      Ireland: null,
      Italy: null,
      Latvia: null,
      Lithuania: null,
      Luxembourg: null,
      Malta: null,
      Netherlands: null,
      Poland: null,
      Portugal: null,
      Romania: null,
      "Slovak Republic": null,
      Slovenia: null,
      Spain: null,
      Sweden: null,
      "United Kingdom": null
    }
  });

  // Selection
  var elems = document.querySelectorAll("select");
  M.FormSelect.init(elems);
});
