function subtractYears(date, years) {
  date.setFullYear(date.getFullYear() - years);
  return date;
}

function loading(flag) {
  if (flag) {
    $("#modalAlertasSplash").modal({ backdrop: "static", keyboard: false });
    $("#textoModalSplash").html(
      "<img src='view/img/logo_home.png' class='splash_charge_logo'><img src='view/img/loading6.gif' class='splash_charge_logo' style='margin-top: -50px;'>"
    );
    $("#modalAlertasSplash").modal("show");
  } else {
    $("#modalAlertasSplash").modal("hide");
  }
}

function alertField(id, msg) {
  var jId = `#${id}`;
  alertasToast(`<img src='view/img/info.png' class='splash_load'><br/>${msg}`);
  $(jId).val("");
  $(jId).addClass("is-invalid");
  $(jId).focus();
  $(jId).select();
}

function alertRequired(id, name, showAlert) {
  var jId = `#${id}`;
  if (showAlert)
    alertasToast(
      `<img src='view/img/info.png' class='splash_load'><br/>El campo ${name} es requerido`
    );
  $(jId).val("");
  $(jId).addClass("is-invalid");
  $(jId).focus();
  $(jId).select();
}

function alertRequiredMany(ids, name, showAlert) {
  var jIds = ids.map((id) => `#${id}`);
  if (showAlert)
    alertasToast(
      `<img src='view/img/info.png' class='splash_load'><br/>El campo ${name} es requerido`
    );
  jIds.forEach((jId) => {
    $(jId).val("");
    $(jId).addClass("is-invalid");
    $(jId).focus();
    $(jId).select();
  });
}

function cleanField(id) {
  var jId = `#${id}`;
  $(jId).removeClass("is-invalid");
}

function conditionNeg1AndEmpty(val) {
  return val != null && `${val}` != "-1" && val != "";
}

function findFecIniByYearMonth(yearmonth) {
  var splitted = yearmonth.split("-");
  if (splitted.length > 1) {
    return moment(`${yearmonth}-01`);
  }
  return moment(new Date());
}

function findFecEndByYearMonth(yearmonth) {
  var splitted = yearmonth.split("-");
  if (splitted.length > 1) {
    var idx = Number(splitted[1]);
    var month = __CONSTANTS.months[idx - 1];
    if (month) {
      return moment(`${yearmonth}-${month.numDays}`);
    }
    return moment(new Date());
  }
  return moment(new Date());
}
