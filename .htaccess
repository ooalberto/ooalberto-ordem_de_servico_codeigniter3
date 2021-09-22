# Código para retirar o 'index.php' da url e acessar apenas os controller

# ATENÇÃO: Renomem o arquivo para '.htaccess'

RewriteEngine on
RewriteCond $1 !^(index\.php|resources|robots\.txt)
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L,QSA]
