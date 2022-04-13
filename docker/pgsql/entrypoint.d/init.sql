CREATE USER testing WITH PASSWORD 'secret';
ALTER USER testing CREATEDB;

create database text_metrics_testing;

GRANT ALL PRIVILEGES ON DATABASE text_metrics_testing TO testing;
