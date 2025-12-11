## --------------------------------------------------
##   Makefile minimal pour Jenkins / Epitech
## --------------------------------------------------

# Commandes "vides" pour éviter les erreurs Jenkins.
# Elles ne font rien, mais permettent aux pipelines de passer.

.PHONY: all clean fclean re build test

all:
	@echo "Nothing to build"

clean:
	@echo "Nothing to clean"

fclean:
	@echo "Nothing to fully clean"

re: fclean all
	@echo "Rebuild complete"

build:
	@echo "No build required for this project"

test:
	@echo "No tests available"
