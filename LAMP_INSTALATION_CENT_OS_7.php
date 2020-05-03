Step 1 — Install Apache on CentOS 7
https://www.cyberciti.biz/faq/how-to-install-php-7-2-on-centos-7-rhel-7/

sudo yum install httpd

sudo systemctl start httpd.service


Step 2 -  install PHP 7.2 on CentOS 7

sudo yum install epel-release  
sudo yum install http://rpms.remirepo.net/enterprise/remi-release-7.rpm  
sudo yum install yum-utils  
sudo yum-config-manager --enable remi-php72  
sudo yum update  
sudo yum install php72
You must install “PHP FastCGI Process Manager” called php72-php-fpm along with commonly used modules:  
sudo yum install php72-php-fpm php72-php-gd php72-php-json php72-php-mbstring php72-php-mysqlnd php72-php-xml php72-php-xmlrpc php72-php-opcache

Step 3 -  Install MySQL (MariaDB) on CentOS 7

sudo yum install mariadb-server mariadb  

sudo systemctl start mariadb

sudo mysql_secure_installation  

-------------------- Some Question For-----------------------------
Enter current password for root (enter for none):
OK, successfully used password, moving on...

Setting the root password ensures that nobody can log into the MariaDB
root user without the proper authorization.

New password: password
Re-enter new password: password
Password updated successfully!
Reloading privilege tables..  
 ... Success!  
Step 4 -  Install PHPMYADMIN on CentOS 7  

sudo yum install epel-release  
sudo yum install phpmyadmin
