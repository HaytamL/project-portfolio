<div align='center'><h1>Job Board</h1></div>

<p>
Dans le cadre d'un projet de formation chez Epitech Strasbourg en 3ème année (Pré-MSC), nous avons réalisé ce site.
</p>

<div align='left'><h1>Installation</h1></div>

<ul>
  <li>Lancer son environnement Apache, démarrer MySQL</li>
  <li>Créer son fichier <code>.env</code> en se basant sur l'exemple fourni</li>
  <li>Installer les dépendances : <code>composer install</code></li>
  <li>Créer la base de données via les commandes :</li>
</ul>

<pre><code>
symfony console doctrine:database:create
symfony console make:migration
symfony console doctrine:migrations:migrate
</code></pre>

<ul>
  <li>Générer les clés SSL : <code>php bin/console lexik:jwt:generate-keypair</code></li>
  <li>Démarrer le projet via la commande : <code>symfony server:start</code></li>
  <li>Se rendre sur : <a href="https://127.0.0.1:8000/">https://127.0.0.1:8000/</a></li>
</ul>

<div align='left'><h1>Contexte</h1></div>

<p>
Ce site a pour but de permettre à des utilisateurs inscrits de postuler à des offres d’emploi, mais aussi d'obtenir des informations sur celles-ci.
</p>
<p>
Le site est fourni avec un tableau de bord réservé à l’administrateur. Il permet de :
</p>
<ul>
  <li>Créer des entreprises, des offres d’emploi, des utilisateurs et leurs candidatures</li>
  <li>Voir, modifier et supprimer tout élément lié à la base de données</li>
  <li>Créer une interface qui claque !</li>
</ul>

<div align='left'><h1>Stack technique</h1></div>

<ul>
  <li>Symfony</li>
  <li>MySQL</li>
  <li>TailwindCSS (DaisyUI pour certains component)</li>
  <li>jQuery</li>
  <li>Axios</li>
</ul>
