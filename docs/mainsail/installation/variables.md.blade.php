---
title: Installation - Environment Variables
---

# Mainsail Environment variables

## Logger Variables

### CORE_LOG_LEVEL

This variable determines the severity of messages that are logged.

### CORE_LOG_LEVEL_FILE

This variable determines where the log files are stored.

## P2P Variables

### CORE_P2P_HOST

This variable determines the host at which the P2P API will be listening for traffic.

### CORE_P2P_PORT

This variable determines the port at which the P2P API will be listening for traffic.

### CORE_P2P_API_NODES

This variable determines the list of nodes that has running Mainsail Public API. List is shared with other nodes.

### CORE_P2P_MAX_PEERS_BROADCAST

This variable determines how many peers a message or transaction should be broadcasted to.

### CORE_P2P_MAX_PEERS_SAME_SUBNET

This variable determines how many peers from the same subnet are allowed to connect.

### CORE_P2P_MIN_NETWORK_REACH

This variable determines minimum number of peers that should be connected.

### CORE_P2P_PEER_BAN_TIME

This variable determines how long a peer should be banned for after behaving maliciously.

### CORE_P2P_RATE_LIMIT

This variable determines how many requests per second can be sent by a peer.

### CORE_P2P_RATE_LIMIT_POST_TRANSACTIONS

This variable determines how many transaction requests per second can be sent by a peer.

### CORE_P2P_API_NODES_MAX_CONTENT_LENGTH

This variable determines the maximum content length of a request.

### CORE_SKIP_PEER_STATE_VERIFICATION

This variable determines if the peer state verification should be skipped.

### CORE_P2P_DEVELOPMENT_MODE_ENABLED

This variable determines if the P2P API is in development mode. Development mode disables some security features and opens up HTTP endpoints.

### DISABLE_P2P_SERVER

This variable determines if the P2P server should be disabled.

## State Variables

### CORE_STATE_EXPORT_DISABLED

This variable determines if state export is disabled.

### CORE_STATE_EXPORT_INTERVAL

This variable determines how often the state should be exported.

### CORE_STATE_EXPORT_RETAIN_FILES

This variable determines how many export files should be retained.

## API Database Variables

### CORE_DB_DATABASE

This variable determines what database will be used for database communication.

### CORE_DB_HOST

This variable determines what host will be used for database communication.

### CORE_DB_PASSWORD

This variable determines what password will be used for database communication.

### CORE_DB_PORT

This variable determines what port will be used for database communication.

### CORE_DB_USERNAME

This variable determines what username will be used for database communication.

## Transaction pool Variables

### CORE_TRANSACTION_POOL_DISABLED

This variable determines if the transaction pool should be disabled.

### CORE_TRANSACTION_POOL_MAX_PER_REQUEST

This variable determines how many transactions can be broadcast in a single request.

### CORE_TRANSACTION_POOL_MAX_PER_SENDER

This variable determines how many transactions can be in the transaction pool by a single sender.

### CORE_RESET_POOL

This variable determines if transaction pool database should be truncated at boot.

## Webhooks Variables

### CORE_WEBHOOKS_ENABLED

This variable determines if webhooks are enabled.

### CORE_WEBHOOKS_HOST

This variable determines the host at which the Webhook API will be listening for traffic.

### CORE_WEBHOOKS_PORT

This variable determines the port at which the Webhook API will be listening for traffic.

### CORE_WEBHOOKS_TIMEOUT

This variable determines how long it will take for a request to timeout when trying to transmit a webhook payload.

## Crypto worker Variables

### CORE_CRYPTO_WORKER_COUNT

This variable determines how many node workers are used for cryptographic operations.

### CORE_CRYPTO_WORKER_LOGGING_ENABLED

This variable determines if the cryptographic worker logs are enabled.

## API Variables

### CORE_API_CACHE

This variable determines if the API makes use of caching to improve performance.

### CORE_API_DISABLED

This variable determines if the API is enabled.

### CORE_API_HOST

This variable determines the host at which the API will listen for traffic.

### CORE_API_NO_ESTIMATED_TOTAL_COUNT

This variable determines if estimated counts should be used. This greatly enhanced performance will yield in inaccurate counts.

### CORE_API_PORT

This variable determines the port at which the API will listen for traffic.

### CORE_API_RATE_LIMIT_BLACKLIST

This variable determines which IP addresses are unable to send any requests to the API.

### CORE_API_RATE_LIMIT_DISABLED

This variable determines if rate limiting is disabled.

### CORE_API_RATE_LIMIT_USER_EXPIRES

This variable determines how long it takes before the rate limiting expires.

### CORE_API_RATE_LIMIT_USER_LIMIT

This variable determines how many requests a user can send for any given period.

### CORE_API_RATE_LIMIT_WHITELIST

This variable determines which user are exempted from rate limiting.

### CORE_API_SSL

This variable determines if SSL (HTTPS) is enabled.

### CORE_API_SSL_CERT

This variable determines where the SSL Certification is located.

### CORE_API_SSL_HOST

This variable determines the host at which the HTTPS API will listen for traffic.

### CORE_API_SSL_KEY

This variable determines where the SSL Key is located.

### CORE_API_SSL_PORT

This variable determines the host at which the HTTPS API will listen for traffic.

## Application Variables

### CORE_PATH_DATA

> This variable is exposed by core and cannot be manually configured.

This variable exposes the path at which application stores data.

### CORE_PATH_CONFIG

This variable exposes the path at which application stores configuration.

### CORE_PATH_CACHE

> This variable is exposed by core and cannot be manually configured.

This variable exposes the path at which application stores cache.

### CORE_PATH_LOG

> This variable is exposed by core and cannot be manually configured.

This variable exposes the path at which application stores logs.

### CORE_PATH_TEMP

> This variable is exposed by core and cannot be manually configured.

This variable exposes the path at which application stores temporary data.

### CORE_NPM_REGISTRY

This variable determines which NPM registry url should be used.
