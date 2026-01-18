<?php
class Data
{
  private $conn;

  public function __construct()
  {
    $DB_HOST = getenv("DB_HOST") ?: "localhost";
    $DB_NAME = getenv("DB_NAME") ?: "club_informatique";
    $DB_USER = getenv("DB_USER") ?: "root";
    $DB_PWD = getenv("DB_PWD") ?: "";

    try {
      $this->conn = new PDO("mysql:host=" . $DB_HOST . ";dbname=" . $DB_NAME, $DB_USER, $DB_PWD);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function insert($nom, $prenom, $age, $genre, $nom_facebook, $mot_de_passe)
  {
    // Vérifier si le nom ou le nom_facebook existe déjà
    $sql = "SELECT COUNT(*) FROM users WHERE nom = ? OR nom_facebook = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$nom, $nom_facebook]);
    $count = $stmt->fetchColumn();
    if ($count > 0) {
      // Utilisez une variable globale ou retournez false pour gérer le message côté appelant
      echo "Le nom ou le nom d'utilisateur existe déjà.";
      return false;
    } else {
      $sql = "INSERT INTO users (nom, prenom, age, genre, nom_facebook, mot_de_passe) VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([$nom, $prenom, $age, $genre, $nom_facebook, $mot_de_passe]);
      return true;
    }
  }


  public function verify_connexion($utilisateur, $mot_de_passe)
  {
    $sql = "SELECT * FROM users WHERE nom_facebook = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$utilisateur]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
      return $user;
    }
    return false;
  }
  public function fetch_all_members()
  {
    $sql = "SELECT * FROM users";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function Select_all_members()
  {
    $sql = "SELECT * FROM AddMembres";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


  public function supprimer($id)
  {
    $sql = "DELETE FROM AddMembres WHERE id = ? ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$id]);
  }
  public function fetch_member_by_id($id)
  {
    $sql = "SELECT * FROM AddMembres WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }


  public function insertion($nom, $prenom, $age, $email, $nom_facebook, $genre)
  {
    $sql = "INSERT INTO AddMembres(nom,prenom,age,email,nom_facebook,genre) VALUES (?,?,?,?,?,?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$nom, $prenom, $age, $email, $nom_facebook, $genre]);
  }

  public function update($nom, $prenom, $age, $email, $nom_facebook, $genre, $id)
  {
    $sql = "UPDATE AddMembres SET nom = ?, prenom = ?, age = ?, email = ?, nom_facebook = ?, genre = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$nom, $prenom, $age, $email, $nom_facebook, $genre, $id]);
  }

  public function search_members($search)
  {
    $sql = "SELECT * FROM AddMembres WHERE nom LIKE ? OR prenom LIKE ? OR email LIKE ? OR nom_facebook LIKE ? OR genre LIKE ?";
    $stmt = $this->conn->prepare($sql);
    $like_search = "%" . $search . "%";
    $stmt->execute([$like_search, $like_search, $like_search, $like_search, $like_search]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}




$message = "";
$data = new Data();
$all_membres = $data->fetch_all_members();

if (isset($_POST["inscription"])) {

  $nom = trim(htmlspecialchars($_POST["nom"]));
  $prenom = trim(htmlspecialchars($_POST["prenom"]));
  $age = trim(htmlspecialchars($_POST["age"]));
  $genre = trim(htmlspecialchars($_POST["genre"]));
  $nom_facebook = trim(htmlspecialchars($_POST["nom_facebook"]));
  $mot_de_passe = trim(htmlspecialchars($_POST["motdepasse"]));


  // Sécurisation du mot de passe
  // $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
  $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
  if ($data->insert($nom, $prenom, $age, $genre, $nom_facebook, $mot_de_passe)) {
    $message = "Inscription réussie !";
    header("Location: ../inscription.php?message=" . urlencode($message));
  }else {
    $message = "Le nom ou le nom d'utilisateur existe déjà.";
    header("Location: ../inscription.php?message=" . urlencode($message));
  }
}
if (isset($_POST['connexion'])) {
  $nom_facebook = trim(htmlspecialchars($_POST['nom_facebook']));
  $mot_de_passe = trim(htmlspecialchars($_POST['motdepasse']));

  $user = $data->verify_connexion($nom_facebook, $mot_de_passe);
  if ($user) {
    // Connexion réussie, vous pouvez démarrer une session ou rediriger
    session_start();
    $_SESSION['nom'] = $user['nom'];
    $_SESSION['prenom'] = $user['prenom'];
    $_SESSION['age'] = $user['age'];
    $_SESSION['nom_facebook'] = $user['nom_facebook'];

    header("location: ../views/acceuil/acceuil.php"); //modification de la route 

    exit();
  } else {
    $message = "Nom d'utilisateur ou mot de passe incorrect.";
    header("Location: ../connexion.php?message=" . urlencode($message));
    exit();
  }
}




if (isset($_POST['ajouter'])) {
  $nom = trim(htmlspecialchars($_POST['nom']));
  $prenom = trim(htmlspecialchars($_POST['prenom']));
  $age = trim(htmlspecialchars($_POST['age']));
  $email = trim(htmlspecialchars($_POST['email']));
  $nom_facebook = trim(htmlspecialchars($_POST['nom_facebook']));
  $genre = trim(htmlspecialchars($_POST['genre']));

  $data->insertion($nom, $prenom, $age, $email, $nom_facebook, $genre);
  $message = "Ajout réussi";

  header("Location: ../views/acceuil/acceuil.php?message=" . $message);
}
//modifier et supprimer
if (isset($_GET['action'])) {
  if ($_GET['action'] == "delete") {
    $id = trim(htmlspecialchars($_GET['id']));
    $data->supprimer($id);
    $message = "suppression reussi";
    header("Location: ../views/acceuil/acceuil.php?message=" . $message);
  }
  if ($_GET['action'] == "edit") {
    $id = trim(htmlspecialchars($_GET['id']));

    // Récupérer les données du membre à modifier
    $membre = $data->fetch_member_by_id($id);
    var_dump($membre);
    if ($membre) {
      // Afficher le formulaire de modification avec les données du membre
      header("Location: ../views/modifier.php?id=" . $id);
      exit();
    }
  }
  if ($_GET['action'] == "deconnexion") {
    session_start();
    session_destroy();
    header("Location: ../index.php");
  }

  if($_GET['action'] == "recherche"){
    $search = trim(htmlspecialchars($_POST['search']));
    $all_membres = $data->search_members($search);
    session_start();
    $_SESSION['search_results'] = $all_membres;
    header("Location: ../views/acceuil/acceuil.php");
  }
}

if (isset($_POST['modifier'])) {
  $id = trim(htmlspecialchars($_POST['id']));
  $nom = trim(htmlentities($_POST['nom']));
  $prenom = trim(htmlentities($_POST['prenom']));
  $age = trim(htmlentities($_POST['age']));
  $email = trim(htmlentities($_POST['email']));
  $nom_facebook = trim(htmlentities($_POST['nom_facebook']));
  $genre = trim(htmlentities($_POST['genre']));
  // var_dump($_POST); die();
  $data->update($nom, $prenom, $age, $email, $nom_facebook, $genre, $id);
  $message = "Modification réussie";
  header("Location: ../views/acceuil/acceuil.php?message=" . $message);
}