var __CONFIG = {
  datePicker: {
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    yearRange: "1920:2040",
    firstDay: 1,
    changeMonth: true,
    changeYear: true,
    monthNames: __CONSTANTS.months.map(({ name }) => name),
    monthNamesShort: __CONSTANTS.months.map(({ short }) => short),
    dayNames: __CONSTANTS.days.map(({ name }) => name),
    dayNamesShort: __CONSTANTS.days.map(({ short }) => short),
    dayNamesMin: __CONSTANTS.days.map(({ min }) => min),
  },
  select2: {
    theme: "bootstrap4",
    width: $(this).data("width")
      ? $(this).data("width")
      : $(this).hasClass("w-100")
      ? "100%"
      : "style",
    placeholder: $(this).data("placeholder"),
    allowClear: Boolean($(this).data("allow-clear")),
    closeOnSelect: !$(this).attr("multiple"),
    // sorter: data => data.sort((a, b) => b.text.localeCompare(a.text))
  },
};
