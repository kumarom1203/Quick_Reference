
1. sudo apt-get update

2. sudo apt-get install apache2



3. sudo apt-get install php libapache2-mod-php php-mysql php-curl php-gd php-json php-zip php-mbstring



4. sudo apt-get install mysql-server

5. sudo mysql_secure_installation

6. sudo mysql

7. SELECT user,authentication_string,plugin,host FROM mysql.user;

8. ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'YOUR_PASSWORD';

9. FLUSH PRIVILEGES;

10. exit


11. sudo add-apt-repository universe

12. sudo apt update

13. sudo apt install phpmyadmin php-gettext

14. sudo ln -s /etc/phpmyadmin/apache.conf /etc/apache2/conf-available/phpmyadmin.conf

15. sudo service apache2 restart

16. sudo a2enconf phpmyadmin

17. sudo phpenmod mbstring

18. sudo service apache2 restart




