<?php

$title = "Modify Reservations";

require __DIR__."/../layout/header.php";

$obj_reservation = $data['info']['table_chambre'][0];
$id = isset($obj_reservation->id_reservation) ? $obj_reservation->id_reservation : $data['info']['id'];

?>
<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-8">
    <?php if (!empty($data['error'])): ?>
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Danger alert!</span> <?php echo htmlspecialchars($data['error']); ?>
        </div>
        <?php endif; ?>
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Modify Reservation</h1>

        <form action="" method="post" class="space-y-6">
            <fieldset>
                <legend class="text-xl font-medium text-gray-800 mb-4">Reservation Details</legend>

                <!-- Code Reservation -->
                <input type="text" name="Code_reservation" placeholder="Code reservation"
                    value="<?php echo isset($obj_reservation->Code_reservation) ? $obj_reservation->Code_reservation : '' ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 mb-4">

                <!-- Type de chambre -->
                <select name="id_type_chambre"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 mb-4">
                    <?php foreach ($data['info']['type_chambre'] as $obj) : ?>
                        <option value="<?= $obj->id_type_chambre ?>" <?= ($obj->id_type_chambre == $obj_reservation->id_type_chambre) ? "selected" : "" ?>>
                            <?= $obj->type_chambre ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <!-- Client -->
                <select name="id_client"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 mb-4">
                    <?php foreach ($data['info']['clients'] as $obj) : ?>
                        <option value="<?= $obj->id_client ?>" <?= (isset($obj_reservation->id_client) && $obj->id_client == $obj_reservation->id_client) ? "selected" : "" ?>>
                            <?= $obj->nom_complet ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <!-- Nombre adultes enfants de chambre -->
                <input type="number" name="nbr_adultes_enfants"
                    value="<?= $obj_reservation->nbr_adultes_enfants ?>"
                    placeholder="Nombre adultes/enfants de chambre"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 mb-4">

                <!-- Date Arrivee and Date Depart -->
                <div class="grid grid-cols-2 gap-4">
                    <input type="date" name="date_arrivee" value="<?= $obj_reservation->date_arrivee ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 mb-4">
                    <input type="date" name="date_depart" value="<?= $obj_reservation->date_depart ?>"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 mb-4">
                </div>

                <!-- Submit Button -->
                <input type="submit" value="Modify" name="go"
                    class="mt-4 px-4 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 cursor-pointer">
            </fieldset>
        </form>

        <?php if (isset($data['info']['table_chambre'])) : ?>
            <div class="mt-8">
                <table class="min-w-full bg-white border">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Image Chambre</th>
                            <th class="border px-4 py-2">Numero de chambre</th>
                            <th class="border px-4 py-2">Type de chambre</th>
                            <th class="border px-4 py-2">Nombre adultes/enfants</th>
                            <th class="border px-4 py-2">Renfort Chambre</th>
                            <th class="border px-4 py-2">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['info']['table_chambre'] as $obj_chambre): ?>
                        <tr>
                            <td class="border px-4 py-2">
                                <img src="/pictures/chambres/<?= $obj_chambre->photo_chambre ?>" alt="Chambre Photo"
                                    class="w-64 h-64 object-cover rounded-lg">
                            </td>
                            <td class="border px-4 py-2"><?= $obj_chambre->numero_chambre ?></td>
                            <td class="border px-4 py-2"><?= $obj_chambre->type_chambre ?></td>
                            <td class="border px-4 py-2"><?= $obj_chambre->nombre_adultes_enfants_ch ?></td>
                            <td class="border px-4 py-2"><?= $obj_chambre->renfort_chambre == 1 ? "Renfortable" : "Pas Renfortable" ?></td>
                            <td class="border px-4 py-2">
                                <?php if ($_SERVER['REQUEST_METHOD'] == "POST") : ?>
                                <a href="/reservations/validee/<?= $obj_chambre->id_chambre ?>/<?= $_POST['id_client'] ?>/<?= $_POST['Code_reservation'] ?>/<?= $_POST['date_depart'] ?>/<?= $_POST['date_arrivee'] ?>/<?= $_POST['nbr_adultes_enfants'] ?><?php echo isset($id) ? "/$id" : "" ?>"
                                    class="text-green-500 hover:underline">Valider</a>
                                <?php else : ?>
                                <a href="#" class="text-gray-500">Valider</a>
                                <?php endif ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
require __DIR__."/../layout/footer.php";
?>
