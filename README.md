# PHP Zend opcache on Cacti via SNMP

## Extracting the statistics

To extract stats from opcache we use the opcache_get_status() function and format the key fields as plain text to make it easy for snmpd to ingest.

The monitoring script opcachestat.php can be put somewhere it can be served by the webserver you are using with PHP. For example the configuration for Nginx with php-fpm for this placed in the root of a web site would be:

```
        location /opcachestat.php {
                access_log off;
                allow ::1;
                allow 127.0.0.1;
                deny all;
                # With php5-fpm:
                fastcgi_pass unix:/var/run/php5-fpm.sock;
                root /path/to/root/of/site/;
                include fastcgi_params;
        }
```

Then to pick the data up via snmpd, add the lines from snmpd.conf.cacti-php-opcache to /etc/snmp/snmpd.conf to call the script for appropriate SNMP requests.

Restart snmpd and you should be able to get basic stats via SNMP.

## Cacti Templates

I have generated some basic Cacti Templates for opcache.

Simply import the template cacti_host_template_php_opcache.xml, and add the graphs you want to the appropriate device graphs in Cacti. It should just work if your SNMP is working correctly for that device (ensure other SNMP parameters are working for that device).
