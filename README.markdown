# TFC Web

Instalar XAMPP
Configuracion apache:
VirtualHost example:
<VirtualHost *:80>
    ServerAdmin webmaster@dummy-host.example.com
    ServerName dev.tfc.com
    DocumentRoot "C:\Users\Brunoli\Documents\NetBeansProjects\TFC"
    ErrorLog "logs/dummy-host.example.com-error.log"
    CustomLog "logs/dummy-host.example.com-access.log" common
	<Directory "C:\Users\Brunoli\Documents\NetBeansProjects\TFC">
		Options All
	    AllowOverride All
	    Require all granted
	</Directory>
</VirtualHost>

/etc/hosts
127.0.0.1 dev.tfc.com

Configuracion MySQL (usar local asi no hay lag):
mysql> create database Onfest; Query OK, 1 row affected (0.00 sec)
grant all privileges on *.* to 'wi191562'@'%' identified by 'zove95DAte';
grant all privileges on *.* to 'wi191562'@'localhost' identified by 'zove95DAte';
grant all privileges on *.* to 'wi191562'@'127.0.0.1' identified by 'zove95DAte';

mysql.exe --user=wi191562 --password=zove95DAte wi191562_tfc < C:\Users\Brunoli\Documents\NetBeansProjects\TFC\other\tfc-dump-25-4-15.sql