#!/bin/bash

# S3 bucket details
BUCKET_NAME="walter-academy"
BACKUP_NAME="$(date +%Y-%m-%d-%H-%M-%S).sql.gz"

# Backup the MySQL database
sudo mysqldump bookstack | gzip > /tmp/${BACKUP_NAME}

# Upload the backup to S3
aws s3 cp /tmp/${BACKUP_NAME} s3://${BUCKET_NAME}/backups/${BACKUP_NAME}

# Remove the backup from the local machine
rm /tmp/${BACKUP_NAME}