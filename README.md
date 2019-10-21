# PHP
git clone https://github.com/Dvilx99/PHP.git

git status
Affiche l’état de l’index
git log (-[n])
Affiche l’historique des commit (ou les n derniers)
git branch
Affiche toutes les branches du repo local
git branch -r
Affiche toutes les branches que l’on a fetch des remotes

git add [fichier]
Ajoute à l’index une créa/modif/suppr de fichier
git add -A
Ajoute à l’index toutes les créa/modifs/supprs de fichier
git reset [fichier]
Enlève une créa/modif/suppr de l’index (mais la garde dans le working dir)

git commit -m [message]
Créé un commit avec les fichiers de l’index
git commit -am [message]
Créé un commit, directement avec tous les fichiers modifiés
git reset --hard HEAD
Abandonne toutes les modifications et retourne au dernier commit
git tag [nom]
Créé un tag sur le commit actuel

git checkout [branch]
Se place sur le dernier commit d’une branche, et récupère son état dans le working dir
git branch [nom]
Créé une branche (mais ne s’y place pas)
git checkout -b [nom]
Créé une branche et checkout dessus directement
git merge [branch]
Merge la branche ciblée dans la branche actuelle

git fetch
Récupère les branches distantes dans leur image locale respective
git pull
Git fetch + merge l’image locale dans la branche locale
git push
Actualise la branche distante avec la branche locale
