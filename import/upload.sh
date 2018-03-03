cd /home/ubuntu/My-Blog
bash import/generate_sql.sh > import/update.sql
mysql -u root --password=hezw77ze blog < import/update.sql
