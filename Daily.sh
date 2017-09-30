git stash
git checkout WIP
git stash pop
git add -A
git commit -m "Update"
git tag "$(date +'%m/%d/%Y')"
git push --tags
