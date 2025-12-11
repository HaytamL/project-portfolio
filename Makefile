.PHONY: all clean fclean re build tests_run

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

test_run:
	@echo "No tests to run"
