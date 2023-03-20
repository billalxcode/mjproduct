echo "Stop mysqld"
sudo service  mysqld stop
echo "Kill all port apache2 and nginx"
sudo service apache2 stop
sudo service nginx stop
