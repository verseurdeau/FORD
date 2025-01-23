<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-gray-100">
    <div class="ml-64 p-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold text-gray-800">Data Absensi</h1>
                <a href="<?= site_url('absensi/tambah') ?>" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                    <i class="fas fa-plus mr-2"></i>Tambah Data
                </a>
            </div>

            <!-- Pesan Sukses atau Error -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
                    <?= $this->session->flashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-semibold text-gray-600 uppercase tracking-wider">ID Absensi</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-semibold text-gray-600 uppercase tracking-wider">Nama Karyawan</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-semibold text-gray-600 uppercase tracking-wider">Shift</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-semibold text-gray-600 uppercase tracking-wider">Keterangan</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <?php foreach ($absensi as $row): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300"><?= $row->id_absensi ?></td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300"><?= $row->nama_krywn ?></td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300"><?= $row->tanggal ?></td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300"><?= $row->shift ?></td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300"><?= $row->keterangan ?></td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                                    <div class="flex">
                                        <!-- Edit Button -->
                                        <a href="<?= site_url('absensi/edit/' . $row->id_absensi) ?>" class="text-blue-600 hover:text-blue-900 mr-4">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Delete Button -->
                                        <a href="javascript:void(0)" onclick="confirmDelete('<?= $row->id_absensi ?>')" class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                window.location.href = '<?= site_url('absensi/hapus/') ?>' + id;
            }
        }
    </script>
</body>

</html>
