    <article>
        <h1>Recipient</h1>
        <address>
            <p>TOOCOOL<br>Auto Rent</p>
        </address>
        <table class="inventory">
            <?php foreach ($transaksi as $tr) : ?>
                <thead>
                    <tr>
                        <th>Nama Customer</th>
                        <th>Merek Mobil</th>
                        <th>Tanggal Rental</th>
                        <th>Tanggal Kembali</th>
                        <th>Biaya Sewa Perhari</th>
                        <th>Jumblah Hari Sewa</th>
                        <th>Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a class=""></a><?= $tr->nama; ?></td>
                        <td><?= $tr->merek; ?></td>
                        <td><?= date('d/m/Y', strtotime($tr->tgl_rental)); ?></td>
                        <td><?= date('d/m/Y', strtotime($tr->tgl_kembali)); ?></td>
                        <td><span data-prefix>Rp</span><span><?= number_format($tr->harga, 0, ',', '.'); ?>,-</span></td>
                        <td>
                            <?php
                            $x = strtotime($tr->tgl_kembali);
                            $y = strtotime($tr->tgl_rental);
                            $jmlHari = abs(($x - $y) / (60 * 60 * 24));
                            ?>
                            <?= $jmlHari; ?> Hari
                        </td>
                        <td> <?php if ($tr->status_pembayaran == '0') {
                                    echo "Belum Lunas";
                                } else {
                                    echo "Lunas";
                                } ?>
                        </td>
                    </tr>
                </tbody>
                <a class=""></a>
                <table class="balance">
                    <tr>
                        <th><span>Total Pembayaran</span></th>
                        <td>
                            Rp<?= number_format($tr->harga * $jmlHari, 0, ',', '.'); ?>,-
                        </td>
                    </tr>
                </table>
            <?php endforeach; ?>
        </table>
        <script>
            window.print();
        </script>