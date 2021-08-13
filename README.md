# SHAKEN/STIR Root Certificates

This is an automatically updated repository of all SHAKEN/STIR Root Certificates Globally.

# Usage
Compare the contents of the text file 'SERIAL' to your current version. If it does not match,
resync all certificates (which have the suffix .crt).

## SERIAL
The format of 'SERIAL' is an integer specifing the utime when an update was discovered.

## SERIALHASH
This is the sha256sum of concatenating the contents of all certificate files, sorted by name.
This is used to discover if SERIAL needs to be updated

## regions.json
This identifies which root certificate is issued by which region.

