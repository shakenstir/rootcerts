SHELL=/bin/bash

components: ca-list.json
	@echo There is now a $< file
	CERTS=$$(jq '.trustList' < $< | grep BEGIN) && echo $$CERTS

ca-list:
	@if ! curl -s -o $@ https://authenticate-ext-api.iconectiv.com/download/v1/ca-list; then \
		echo 'Try something else to download the ca-list and put it here'; \
		exit 1; \
	fi

ca-list.json: ca-list
	cut -d. -f2 < $< | base64 -d 2>/dev/null > $@ || :


