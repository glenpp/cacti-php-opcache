<?php
# Zend opcache stats collection script for Cacti
#
# See: https://www.pitt-pladdy.com/blog/_20160312-153335_0000_PHP_Zend_opcache_on_Cacti_via_SNMP/
#
#
# Copyright (C) 2016  Glen Pitt-Pladdy
#
#    This program is free software: you can redistribute it and/or modify
#    it under the terms of the GNU General Public License as published by
#    the Free Software Foundation, either version 3 of the License, or
#    (at your option) any later version.
#
#    This program is distributed in the hope that it will be useful,
#    but WITHOUT ANY WARRANTY; without even the implied warranty of
#    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#    GNU General Public License for more details.
#
#    You should have received a copy of the GNU General Public License
#    along with this program.  If not, see <http://www.gnu.org/licenses/>.
#
#
# See: https://www.pitt-pladdy.com/blog/ TODO
#

# This is the status script that goes with the Cacti Templates for opcache via SNMP
# It can be accessed as a snmpd extension with something like:
#	extend phpopcache /usr/bin/curl --silent http://localhost/opcachestat.php

header('Content-Type: text/plain');


$opcachestat = opcache_get_status ( False );
print $opcachestat['memory_usage']['used_memory']."\n";
print $opcachestat['memory_usage']['free_memory']."\n";
print $opcachestat['memory_usage']['wasted_memory']."\n";
print $opcachestat['opcache_statistics']['num_cached_scripts']."\n";
print $opcachestat['opcache_statistics']['num_cached_keys']."\n";
print $opcachestat['opcache_statistics']['max_cached_keys']."\n";
print $opcachestat['opcache_statistics']['hits']."\n";
print $opcachestat['opcache_statistics']['misses']."\n";

?>
