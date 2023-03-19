echo "Stop mysqld"
sudo service  mysqld stop
echo "Kill all port :80"
sudo kill -9 $( sudo lsof -t -i tcp:80)