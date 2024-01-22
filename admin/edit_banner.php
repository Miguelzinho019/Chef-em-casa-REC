<?php
session_start();

include_once('../helpers/database.php');

// Verifica se um ID de post foi passado via GET
if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
} else {
    // Se nenhum ID foi fornecido, redirecione para uma página de erro ou para a lista de posts
    header("Location: ../404.php");
    exit();
}

// Conecta-se ao banco de dados
$connection = connectDatabase();

// Obtém os dados do post existente
$query = "SELECT title, content, image_banner FROM banner WHERE id = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, 'i', $post_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Verifica se o post existe
if ($row = mysqli_fetch_assoc($result)) {
    $existing_title = $row['title'];
    $existing_content = $row['content'];
    $existing_image = $row['image_banner'];
} else {
    // Se o post não existir, redirecione para uma página de erro ou para a lista de posts
    header("Location: ../404.php");
    exit();
}

// Informações da página
$pageInfo = array(
    'title' => 'Editar Postagem',
    'description' => 'Edite sua postagem existente.',
    'pageName' => 'banners',
);

include_once('../components/admin/header.php');
?>

<!-- Conteúdo do dashboard -->
<main class="container py-5">
    <!-- Restante do seu código permanece inalterado -->
</main>

<?php
$currentPage = 'edit_banner';
include_once('../components/admin/footer.php');
?>
