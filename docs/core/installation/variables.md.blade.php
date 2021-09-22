---
title: Installation - Database Variables
---

# Database Variables

## CORE_API_CACHE

This variable determines if the API makes use of caching to improve performance.

## CORE_API_DISABLED

This variable determines if the API is enabled.

## CORE_API_HOST

This variable determines the host at which the API will listen for traffic.

## CORE_API_NO_ESTIMATED_TOTAL_COUNT

This variable determines if estimated counts should be used. This greatly enhanced performance will yield in inaccurate counts.

## CORE_API_PORT

This variable determines the port at which the API will listen for traffic.

## CORE_API_RATE_LIMIT_BLACKLIST

This variable determines which IP addresses are unable to send any requests to the API.

## CORE_API_RATE_LIMIT_DISABLED

This variable determines if rate limiting is disabled.

## CORE_API_RATE_LIMIT_USER_EXPIRES

This variable determines how long it takes before the rate limiting expires.

## CORE_API_RATE_LIMIT_USER_LIMIT

This variable determines how many requests a user can send for any given period.

## CORE_API_RATE_LIMIT_WHITELIST

This variable determines which user are exempted from rate limiting.

## CORE_API_SSL

This variable determines if SSL (HTTPS) is enabled.

## CORE_API_SSL_CERT

This variable determines where the SSL Certification is located.

## CORE_API_SSL_HOST

This variable determines the host at which the HTTPS API will listen for traffic.

## CORE_API_SSL_KEY

This variable determines where the SSL Key is located.

## CORE_API_SSL_PORT

This variable determines the host at which the HTTPS API will listen for traffic.

## CORE_DB_DATABASE

This variable determines what database will be used for database communication.

## CORE_DB_HOST

This variable determines what host will be used for database communication.

## CORE_DB_PASSWORD

This variable determines what password will be used for database communication.

## CORE_DB_PORT

This variable determines what port will be used for database communication.

## CORE_DB_USERNAME

This variable determines what username will be used for database communication.

## CORE_LOG_LEVEL

This variable determines the severity of messages that are logged.

## CORE_LOG_LEVEL_FILE

This variable determines where the log files are stored.

## CORE_MAX_TRANSACTIONS_IN_POOL

This variable determines how many transactions can be in the transaction pool at any given time.

## CORE_MANAGER_ARCHIVE_FORMAT

This variable determines which archive format is used for storing logs.

## CORE_MANAGER_DISABLED

This variable determines if the Manager API is disabled.

## CORE_MANAGER_HOST

This variable determines the host at which the Manager API will be listening for traffic.

## CORE_MANAGER_PORT

This variable determines the port at which the Manager API will be listening for traffic.

## CORE_MANAGER_PUBLIC_IP

This variable determines the public ip of host.

## CORE_MANAGER_SSL

This variable determines if SSL (HTTPS) is enabled for the Manager API.

## CORE_MANAGER_SSL_CERT

This variable determines where the SSL Certification is located.

## CORE_MANAGER_SSL_HOST

This variable determines the host at which the HTTPS Manager API will be listening for traffic.

## CORE_MANAGER_SSL_KEY

This variable determines where the SSL Key is located.

## CORE_MANAGER_SSL_PORT

This variable determines the port at which the HTTPS Manager API will be listening for traffic.

## CORE_NETWORK_NAME

> This variable is exposed by core and cannot be manually configured.

This variable exposes the name of the network that has been configured.

## CORE_NPM_REGISTRY

This variable determines which NPM registry url should be used.

## CORE_P2P_HOST

This variable determines the host at which the P2P API will be listening for traffic.

## CORE_P2P_MAX_PEER_SEQUENTIAL_ERRORS

This variable determines how many errors a peer can cause before it is disconnected.

## CORE_P2P_MAX_PEERS_SAME_SUBNET

This variable determines how many peers from the same subnet are allowed to connect.

## CORE_P2P_MIN_NETWORK_REACH

This variable determines minimum number of peers that should be connected.

## CORE_P2P_PORT

This variable determines the port at which the P2P API will be listening for traffic.

## CORE_P2P_RATE_LIMIT

This variable determines how many requests per second can be sent by a peer.

## CORE_P2P_RATE_LIMIT_POST_TRANSACTIONS

This variable determines how many transaction requests per second can be sent by a peer.

## CORE_PATH_DATA

> This variable is exposed by core and cannot be manually configured.

This variable exposes the path at which core stores application data.

## CORE_RESET_DATABASE

This variable determines if database should be truncated at boot.

## CORE_TOKEN

> This variable is exposed by core and cannot be manually configured.

This variable determines the name of the token.

## CORE_TRANSACTION_POOL_DISABLED

This variable determines if the transaction pool should be disabled.

## CORE_TRANSACTION_POOL_MAX_PER_REQUEST

This variable determines how many transactions can be broadcast in a single request.

## CORE_TRANSACTION_POOL_MAX_PER_SENDER

This variable determines how many transactions can be in the transaction pool by a single sender.

## CORE_WALLET_SYNC_ENABLED

This variable determines if wallets should be synced to the database.

## CORE_WATCH_BLOCKS_DISABLED

This variable determines if monitoring of blocks is disabled.

## CORE_WATCH_ERRORS_DISABLED

This variable determines if monitoring of errors is disabled.

## CORE_WATCH_LOGS_DISABLED

This variable determines if monitoring of logs is disabled.

## CORE_WATCH_QUERIES_DISABLED

This variable determines if monitoring of queries is disabled.

## CORE_WATCH_QUEUES_DISABLED

This variable determines if monitoring of queues is disabled.

## CORE_WATCH_ROUNDS_DISABLED

This variable determines if monitoring of rounds is disabled.

## CORE_WATCH_SCHEDULES_DISABLED

This variable determines if monitoring of schedules is disabled.

## CORE_WATCH_TRANSACTIONS_DISABLED

This variable determines if monitoring of transactions is disabled.

## CORE_WATCH_WALLETS_DISABLED

This variable determines if monitoring of wallets is disabled.

## CORE_WATCH_WEBHOOKS_DISABLED

This variable determines if monitoring of webhooks is disabled.

## CORE_WATCHER_ENABLED

This variable determines if monitoring is enabled.

## CORE_WEBHOOKS_ENABLED

This variable determines if webhooks are enabled.

## CORE_WEBHOOKS_HOST

This variable determines the host at which the Webhook API will be listening for traffic.

## CORE_WEBHOOKS_PORT

This variable determines the port at which the Webhook API will be listening for traffic.

## CORE_WEBHOOKS_TIMEOUT

This variable determines how long it will take for a request to timeout when trying to transmit a webhook payload.
