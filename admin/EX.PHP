<?php
$pageInfo = array(
    'title' => 'banners',
    'description' => 'Visualize e edite seus banners.',
    'pageName' => 'Meus banners',
);

include_once('../components/admin/header.php');

$query = "SELECT * FROM banner WHERE user_id = " . $_SESSION['user_id'];

$result = mysqli_query($connection, $query);

$banners = array();

if(mysqli_num_rows($result) > 0){
    $banners = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>

<!-- Conteúdo do dashboard -->
<main class="container py-5">
    <div class="row">
        <!-- Sidebar do dashboard -->
        <div class="col-md-3">
            <?php
                include_once('../components/admin/menu_sidebar.php');
            ?>
        </div>
        <!-- Main do dashboard -->
        <section class="col-md-9">
            <h2><?= $pageInfo['title'] ?></h2>
            <p><?= $pageInfo['description'] ?></p>
            <a href="creat_banner.php" class="btn btn-success my-2 my-sm-0 text-light">
                Adicionar banner
            </a>
            <hr>

            <?php if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?>" role="alert">
                    <?php echo $_SESSION['message']; ?>
                </div>
            <?php unset($_SESSION['message']); } ?>
            
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Imagem</th>
                                <th>Título</th>
                                <th>Data de Publicação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach($banners as $banner){ ?>

                            <tr>
                                <td>
                                    <?php echo $banner['title']; ?>
                                </td>
                                <td>
                                    <?php echo date('d/m/Y', strtotime($banner['created_at'])); ?>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Ações
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        
                                            <a class="dropdown-item text-danger" href="#"
                                            onclick="confirm('Você realmente deseja apagar essa publicação?') ? window.location.href='requests/request_delete_banner.php?banner_id=<?php echo $banner['id']; ?> ' : ''">
                                                <i class="fas fa-trash"></i>
                                                Excluir
                                            </a>
                                            <a class="dropdown-item" href="../index.php?banner_id=<?php echo $banner['id']; ?>" target="_blank">
                                                <i class="fas fa-eye"></i>
                                                Ver na página
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
$currentPage = 'index';
include_once('../components/admin/footer.php');
?>
