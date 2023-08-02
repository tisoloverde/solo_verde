### Development

- [x] For Mac:
      Locate php.ini
      vim /opt/homebrew/etc/php/8.0/php.ini

Reemplazar la línea existente por esta nueva:
error_reporting=E_ALL & ~E_WARNING & ~E_NOTICE

### Development - PHP 8 - New Windows 11

php.ini

error_reporting=E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_WARNING & ~E_NOTICE
