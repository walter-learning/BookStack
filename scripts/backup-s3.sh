#!/bin/bash

# Crontab job
# > 0 21 * * * sh /var/www/bookstack/scripts/backup-s3.sh >/dev/null 2>&1

# S3 bucket details
BUCKET_NAME="walter-academy"
BACKUP_NAME="$(date +%Y-%m-%d-%H-%M-%S).sql.gz"

# Backup the MySQL database
sudo mysqldump bookstack | gzip > /tmp/${BACKUP_NAME}

# Upload the backup to S3
aws s3 cp /tmp/${BACKUP_NAME} s3://${BUCKET_NAME}/backups/${BACKUP_NAME}

# Remove the backup from the local machine
rm /tmp/${BACKUP_NAME}