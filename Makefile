install:
		composer install
brain-games:
		php bin/brain-games
brain-even:
		php src/Games/brain-even
brain-calc:
		php src/Games/brain-calc
vaildate:
		composer vaildate
lint:
		composer exec --verbose phpcs -- --standard=PSR12 src bin
