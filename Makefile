install:
		composer install
brain-games:
		php bin/brain-games
brain-even:
		php bin/brain-even
vaildate:
		composer vaildate
lint:
		composer exec --verbose phpcs -- --standard=PSR12 src bin
