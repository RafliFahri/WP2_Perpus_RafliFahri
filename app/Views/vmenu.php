<!-- Tugas Pertemuan 5.2 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NasGor Deliver</title>
</head>

<body>
    <center>
        <table>
            <tr>
                <th>
                    Kode
                </th>
                <th>
                    Menu
                </th>
                <th>
                    Harga
                </th>
            </tr>
            <?php foreach ($table as $row) : ?>
                <tr>
                    <td>
                        <?= $row['kdmenu'] ?>
                    </td>
                    <td>
                        <?= $row['nmmenu'] ?>
                    </td>
                    <td>
                        <?= $row['harga'] ?>
                    </td>
                    <td>
                        <!-- <a href="< base_url('menu/update/') . $row['kdmenu'] >">Update</a> -->
                        <form action="<?= base_url('menu/delete/') . $row['kdmenu'] ?>" method="post">
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            
            <?= helper('form') ?>
            <?= form_open('/menu/create') ?>
            <table>
                <tr>
                    <th colspan="3">
                    Form Tambah Menu
                </th>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
            <tr>
                <th><?= form_label('Menu') ?></th>
                <th>:</th>
                <td>
                    <?= form_input(['name' => 'menu']) ?>
                    <!-- <span>
                        <?php
                        // (isset($kode)) ? esc($kode) : null; 
                        ?>
                    </span> -->
                </td>
            </tr>
            <tr>
                <th><?= form_label('Harga') ?></th>
                <td>:</td>
                <td>
                    <?= form_input(['name' => 'harga']) ?>
                    
                </td>
            </tr>
            <tr>
                <th><?= form_label('Gambar') ?></th>
                <td>:</td>
                <td>
                    <?= form_input(['name' => 'gambar']) ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <?= form_submit('submit', 'Simpan') ?>
                </td>
            </tr>
        </table>
        <?= form_close() ?>
        <?php echo(validation_list_errors()) ?>
        <?= form_open('/menu/update') ?>
        <table>
            <tr>
                <th colspan="3">
                    Form Update Menu
                </th>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
            <tr>
                <th><?= form_label('Kode') ?></th>
                <th>:</th>
                <td>
                    <?= form_input(['name' => 'kode']) ?>
                    <!-- <span>
                        <?php
                        // (isset($kode)) ? esc($kode) : null; 
                        ?>
                    </span> -->
                </td>
            </tr>
            <tr>
                <th><?= form_label('Menu') ?></th>
                <th>:</th>
                <td>
                    <?= form_input(['name' => 'menu']) ?>
                    <!-- <span>
                        <?php
                        // (isset($kode)) ? esc($kode) : null; 
                        ?>
                    </span> -->
                </td>
            </tr>
            <tr>
                <th><?= form_label('Harga') ?></th>
                <td>:</td>
                <td>
                    <?= form_input(['name' => 'harga']) ?>

                </td>
            </tr>
            <tr>
                <th><?= form_label('Gambar') ?></th>
                <td>:</td>
                <td>
                    <?= form_input(['name' => 'gambar']) ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <?= form_submit('submit', 'Simpan') ?>
                </td>
            </tr>
        </table>
        <?= form_close() ?>
        <?php if (isset($notif)) {
            esc($notif);
        } ?>

    </center>
</body>

</html>