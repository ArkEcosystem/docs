---
title: Explorer
---

# Explorer

In simple terms, block explorers can give anyone access to all the information contained within that blockchain. You can search every block that was ever created, see every transaction an address has conducted as well as a status of the network and a state of its health. Explorer is an essential part of every blockchain project that wants to give users an easy way of representing blockchain data in an user friendly way. While this is an optional install, we strongly suggest for every project that aims to be of public nature to configure and install it. In case you opt out and don't install it, there is always a way to install it at a later date.

To install it we need to configure some parameters, but first switch the toggle to enable.

## Core IP

Is an IP address of the server that you will be installing your bridgechain on. You had to prepare your server at the start, and in case you missed those steps, see the pre-requirements section at the top of this documentation.

## Explorer IP

Is an IP address or addresses from which the Explorer installation will be accessible. If you want to open it to the public, you can whitelist every IP by inputting `0.0.0.0` in the field. Alternatively, you can declare which IP will have access to it, and you can add additional IP addresses in the configuration file.

## Explorer Port

Is the port number on which Explorer will be accessible. The normal range for this number is usually **1024 to 49151**, and you can decide the port. If you are unsure use default port **4200**.

## Explorer Path

Is the path and folder name on which your Explorer will reside. This is the path where you'll be able to access Explorer files. Default path and folder is `$HOME/core-explorer`, where you can replace core-explorer with your own desired folder name, or simply leave as default.

## Git Remote Origin

Is where you put the git origin of your repository where Explorer will reside and where all changes will be pushed. Essentially, this means that the deployment process will attempt to connect to a location on GitHub you specify and push your custom Explorer code onto it. Also, when future users try to download your modified Explorer, they will do it from this location. If you do not have this configured, you will have to manually provide Explorer code to peers in some other way, so it is advised to have this step pre-configured by handling the GitHub tasks that are necessary to utilize this function. More details on that procedure are found in the pre-requirements section at the top of this documentation.
