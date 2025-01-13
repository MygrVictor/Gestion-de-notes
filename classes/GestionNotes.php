<?php
require_once __DIR__ . '/Note.php';
require_once __DIR__ . '/Matiere.php';
require_once __DIR__ . '/Etudiant.php';
require_once __DIR__ . '/../includes/Database.php';

class GestionNotes
{
    private PDO  $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }
    public function ajouterEtudiant(Etudiant $etudiant)
    {

        $stmt = $this->pdo->prepare("INSERT INTO etudiants (nom, prenom, matricule) VALUES (:nom, :prenom, :matricule)");
        return $stmt->execute([
            ':nom' => $etudiant->getNom(),
            ':prenom' => $etudiant->getPrenom(),
            ':matricule' => $etudiant->getMatricule()
        ]);
    }
    public function ajouterMatiere(Matiere $matiere)
    {

       
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM matieres WHERE codeMatiere = :codeMatiere");
        $stmt->execute([':codeMatiere' => $matiere->getCodeMatiere()]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            throw new Exception("Le codeMatiere existe déjà.");
        }

       
        $stmt = $this->pdo->prepare("INSERT INTO matieres (nomMatiere, codeMatiere) VALUES (:nomMatiere, :codeMatiere)");
        $stmt->execute([
            ':nomMatiere' => $matiere->getNomMatiere(),
            ':codeMatiere' => $matiere->getCodeMatiere()
        ]);
    }

    public function attribuerNote(Note $note) {
        $query = "INSERT INTO notes (id_etudiant, id_matiere, valeurNote) VALUES (:id_etudiant, :id_matiere, :valeurNote)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id_etudiant', $note->getIdEtudiant(), PDO::PARAM_INT);
        $stmt->bindValue(':id_matiere', $note->getIdMatiere(), PDO::PARAM_INT);
        $stmt->bindValue(':valeurNote', $note->getValeurNote(), PDO::PARAM_INT);
        return $stmt->execute();
    }

  


    public function getEtudiants()
    {
        $query = "SELECT id, nom, prenom, matricule FROM etudiants";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getMatieres()
    {
        $query = "SELECT id, nomMatiere, codeMatiere FROM matieres";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

public function getNotes()
{
    $query = "SELECT n.id, n.valeurNote, e.nom AS etudiantNom, e.prenom AS etudiantPrenom, m.nomMatiere 
              FROM notes n
              JOIN etudiants e ON n.id_etudiant = e.id
              JOIN matieres m ON n.id_matiere = m.id";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}}
?>