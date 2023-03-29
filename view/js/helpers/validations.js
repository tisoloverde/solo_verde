function validarRUT(text) {
  // Remove any non-digit characters from the RUT
  var rut = text.replace(/\D/g, "");

  // Check that the RUT is valid length
  if (rut.length !== 9) return false;

  // Extract the verification digit and the numeric part of the RUT
  const verificationDigit = parseInt(rut.charAt(rut.length - 1), 10);
  let numericRUT = parseInt(rut.substr(0, rut.length - 1), 10);

  // Calculate the verification digit using the algorithm
  let sum = 0;
  let multiplier = 2;
  while (numericRUT > 0) {
    const digit = numericRUT % 10;
    sum += digit * multiplier;
    numericRUT = Math.floor(numericRUT / 10);
    multiplier = multiplier === 7 ? 2 : multiplier + 1;
  }
  const calculatedVerificationDigit = 11 - (sum % 11);

  // Compare the calculated verification digit with the extracted digit
  if (calculatedVerificationDigit === 11) return verificationDigit === 0;
  if (calculatedVerificationDigit === 10)
    return verificationDigit === "K" || verificationDigit === "k";
  return verificationDigit === calculatedVerificationDigit;
}

function validarEmail(email) {
  const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return pattern.test(email);
}

function validarNombresApellidos(str) {
  const pattern = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/;
  return pattern.test(str);
}

function validarTelefono(str) {
  const pattern = /^[0-9\s]*$/;
  return pattern.test(str);
}

function validarNavegador(navigator) {
  var pattern =
    /AppMovil|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i;
  return !pattern.test(navigator.userAgent);
}
