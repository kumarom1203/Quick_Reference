
There are many ways how you can fix this issue, if you know the root of the issue.

Problem 1

Firstly, it may be a problem with your apache not having the mod_rewrite.c module installed or enabled.

For this reason, you would have to enable it as follows

Open up your console and type into it, this:

sudo a2enmod rewrite

Restart your apache server.

service apache2 restart

Problem 2

You may also, in addition to the above, if it does not work, have to change the override rule from the apache conf file (either apache2.conf, http.conf , or 000-default file).

Locate "Directory /var/www/"
and 
Locate "Directory /var/www/html"
Change the "Override None" to "Override All"

Problem 1 &  Problem 2  works for Google cloaud
=======================================================

Problem 3 

If you get an error stating rewrite module is not found, then probably your userdir module is not enabled. For this reason you need to enable it.

Type this into the console:

sudo a2enmod userdir

Then try enabling the rewrite module if still not enabled (as mentioned above).

To read further on this, you can visit this site: http://seventhsoulmountain.blogspot.com/2014/02/wordpress-permalink-ubuntu-problem-solutions.html



<Directory "/var/www">
    AllowOverride All
    # Allow open access:
    Require all granted
</Directory>


<Directory "/var/www/html">
    #
    # Possible values for the Options directive are "None", "All",
    # or any combination of:
    #   Indexes Includes FollowSymLinks SymLinksifOwnerMatch ExecCGI MultiViews
    #
    # Note that "MultiViews" must be named *explicitly* --- "Options All"
    # doesn't give it to you.
    #
    # The Options directive is both complicated and important.  Please see
    # http://httpd.apache.org/docs/2.4/mod/core.html#options
    # for more information.
    #
    Options Indexes FollowSymLinks

    #
    # AllowOverride controls what directives may be placed in .htaccess files.
    # It can be "All", "None", or any combination of the keywords:
    #   Options FileInfo AuthConfig Limit
    #
    AllowOverride All

    #
    # Controls who can get stuff from this server.
    #
    Require all granted
</Directory>










