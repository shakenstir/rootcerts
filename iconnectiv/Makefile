SHELL=/bin/bash

components: ca-list.json
	CERTS=$$(jq '.trustList' < $< | grep BEGIN) && echo $$CERTS
	echo "hi"

ca-list:
	@if ! curl -s -o $@ https://authenticate-ext-api.iconectiv.com/download/v1/ca-list; then \
		echo 'Try something else to download the ca-list and put it here'; \
		exit 1; \
	fi

ca-list.jwt: ca-list
	jq -r '.caList' < $< > $@

ca-list.json: ca-list.jwt
	cut -d. -f2 < $< | base64 -d 2>/dev/null > $@ || :


