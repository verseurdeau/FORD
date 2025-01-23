<div class="ml-64 p-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Data Gaji Karyawan</h1>
            <a href="<?= base_url('index.php/gaji/create') ?>" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-plus mr-2"></i>Tambah Data
            </a>
        </div>

        <?php if($this->session->flashdata('success')): ?>
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
        <?= $this->session->flashdata('success') ?>
    </div>
    <?php endif; ?>
    <?php if($this->session->flashdata('error')): ?>
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
            <?= $this->session->flashdata('error') ?>
        </div>
    <?php endif; ?>
<script>
function confirmDelete(deleteUrl) {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        window.location.href = deleteUrl;
    }
}
</script>
        

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                            ID Karyawan
                        </th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                            Nama
                        </th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                            Gaji Pokok
                        </th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                            Tunjangan
                        </th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                            Bonus
                        </th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                            Potongan
                        </th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 font-semibold text-gray-600 uppercase tracking-wider">
                            Tanggal Gajian
                        </th>
                        <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php foreach($gaji as $g): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                            <?= $g->id_krywn ?>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                            <?= $g->nama_krywn ?>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                            Rp <?= number_format($g->gaji_pokok, 0, ',', '.') ?>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                            Rp <?= number_format($g->tunjangan, 0, ',', '.') ?>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                            Rp <?= number_format($g->bonus, 0, ',', '.') ?>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                            Rp <?= number_format($g->potongan, 0, ',', '.') ?>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                            <?= date('d/m/Y', strtotime($g->tgl_gaji)) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                            <div class="flex">
                                <a href="<?= base_url('index.php/gaji/edit/'.$g->id_krywn.'/'.$g->tgl_gaji) ?>" 
                                class="text-blue-600 hover:text-blue-900 mr-4">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)" 
                                onclick="confirmDelete('<?= $g->id_krywn ?>', '<?= $g->tgl_gaji ?>')" 
                                class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <script>
                                    function confirmDelete(id, tanggal) {
                                        if(confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                                            window.location.href = '<?= base_url("index.php/gaji/delete/") ?>' + id + '/' + tanggal;
                                        }
                                    }
                                </script>
                            </div>
                        
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
