<div class="flex h-screen bg-gray-100">

    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="bg-white shadow-sm">
            <div class="px-6 py-4">
                <h1 class="text-2xl font-semibold text-gray-800">Edit Data Kinerja</h1>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
            <div class="max-w-4xl mx-auto">
                <?php if (validation_errors()): ?>
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md">
                        <?= validation_errors() ?>
                    </div>
                <?php endif; ?>

                <?= form_open('kinerja/edit/' . $kinerja->id_pengelolaan, ['class' => 'bg-white rounded-lg shadow-md']) ?>
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-3 gap-4 items-center">
                        <label class="text-sm font-medium text-gray-700">Nama Karyawan</label>
                        <div class="col-span-2">
                            <input type="text" value="<?= $kinerja->nama_krywn ?>"
                                   class="w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md" readonly>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 items-center">
                        <label class="text-sm font-medium text-gray-700">Nilai Kerja</label>
                        <div class="col-span-2">
                            <input type="number" step="0.01" name="nilai_kerja"
                                   value="<?= set_value('nilai_kerja', $kinerja->nilai_kerja) ?>"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   min="0" max="100" required>
                            <p class="mt-1 text-sm text-gray-500">Masukkan nilai antara 0-100</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 items-center">
                        <label class="text-sm font-medium text-gray-700">Status Pengelolaan</label>
                        <div class="col-span-2">
                            <select name="status_pengelolaan" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                                <?php
                                $status_options = ['Sangat Baik', 'Baik', 'Cukup', 'Perlu Peningkatan'];
                                foreach ($status_options as $status): ?>
                                    <option value="<?= $status ?>" 
                                        <?= ($kinerja->status_pengelolaan == $status) ? 'selected' : '' ?>>
                                        <?= $status ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 items-center">
                        <label class="text-sm font-medium text-gray-700">Manajer</label>
                        <div class="col-span-2">
                            <select name="id_manajer"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required>
                                <option value="">Pilih Manajer</option>
                                <?php
                                $current_dept = '';
                                foreach ($manajer as $m):
                                    if ($current_dept != $m->departemen):
                                        if ($current_dept != ''): ?>
                                            </optgroup>
                                        <?php endif; ?>
                                        <optgroup label="<?= $m->departemen ?>">
                                        <?php $current_dept = $m->departemen;
                                    endif; ?>
                                    <option value="<?= $m->id_manajer ?>"
                                        <?= set_select('id_manajer', $m->id_manajer, ($kinerja->id_manajer == $m->id_manajer)) ?>>
                                        <?= $m->nama_manajer ?>
                                    </option>
                                <?php endforeach; ?>
                                <?php if ($current_dept != ''): ?>
                                    </optgroup>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 items-center">
                        <label class="text-sm font-medium text-gray-700">Tanggal Pengelolaan</label>
                        <div class="col-span-2">
                            <input type="date" name="tgl_pengelolaan"
                                   value="<?= set_value('tgl_pengelolaan', date('Y-m-d', strtotime($kinerja->tgl_pengelolaan))) ?>"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                        </div>
                    </div>
                </div>

                <div class="px-6 py-4 bg-gray-100 border-t rounded-b-lg flex justify-end space-x-4">
                    <a href="<?= base_url('kinerja') ?>"
                       class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50">
                        Batal
                    </a>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Simpan Perubahan
                    </button>
                </div>
                <?= form_close() ?>
            </div>
        </main>
    </div>
</div>
