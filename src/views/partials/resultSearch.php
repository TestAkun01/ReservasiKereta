<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php if (!empty($data['schedules'])): ?>
    <ul class="space-y-6">
        <?php foreach ($data['schedules'] as $schedule): ?>
            <?php
            $isAvailable = $schedule['seats_left'] >= $data['tickets'];
            $bgColor = $isAvailable ? 'bg-[#f5b041]' : 'bg-gray-300';
            $textColor = $isAvailable ? 'text-black' : 'text-gray-500';
            $btnClass = $isAvailable ? 'bg-[#f5b041] hover:bg-[#e67e22] text-white' : 'bg-gray-500 text-gray-300 cursor-not-allowed';
            $btnDisabled = $isAvailable ? '' : 'disabled';
            ?>
            <div class="<?= $bgColor ?> py-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
                <li class="bg-white p-6 shadow-lg rounded-lg">
                    <div class="flex justify-between px-6">
                        <div class="ml-4">
                            <p class="italic text-[30px] font-bold <?= $textColor ?>"><i class="bi bi-train-front"></i> Tiket Joyo</p>
                            <p class="text-lg font-semibold <?= $textColor ?>">Kereta : <?= $schedule['name']; ?></p>
                        </div>
                        <div class="self-center text-[60px] mr-4 <?= $textColor ?>">
                            <i class="bi bi-qr-code"></i>
                        </div>
                    </div>
                    <hr class="my-4 border-t-2 border-[#f5b041]">
                    <div class="flex justify-around text-[18px] <?= $textColor ?>">
                        <div>
                            <p><span class="font-semibold">Berangkat:</span> <?= $schedule['from_name']; ?>, <?= $schedule['from_city']; ?></p>
                            <p><span class="font-semibold">Jam Keberangkatan:</span> <?= date('H:i', strtotime($schedule['departure_time'])); ?></p>
                            <p><span class="font-semibold">Tempat Duduk Tersisa:</span> <?= $schedule['seats_left']; ?></p>
                        </div>
                        <div>
                            <p><span class="font-semibold">Tiba:</span> <?= $schedule['to_name']; ?>, <?= $schedule['to_city']; ?></p>
                            <p><span class="font-semibold">Harga:</span> Rp<?= number_format($schedule['price'], 2, ',', '.'); ?></p>
                            <p><span class="font-semibold">Durasi:</span> <?= date('H:i', strtotime($schedule['arrival_time'])); ?></p>
                        </div>
                        <div class="flex items-center">
                            <form action="/reservation" method="POST">
                                <input type="hidden" name="schedule_id" value="<?= $schedule['id']; ?>">
                                <input type="hidden" name="tickets" value="<?= $data['tickets']; ?>">
                                <input type="hidden" name="user_id" value="<?= $_SESSION["user"]["id"] ?? null ?>">
                                <button type="submit" <?= $btnDisabled ?> class="w-[180px] h-[100px] rounded-lg shadow-lg font-bold text-[25px] <?= $btnClass ?> flex items-center justify-center transition">
                                    <i class="bi bi-box-arrow-right mr-2"></i> <?= $isAvailable ? 'Pesan' : 'Habis' ?>
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            </div>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p class="text-center text-white italic mt-6">Tidak ada kereta yang tersedia untuk rute dan tanggal yang dipilih</p>
<?php endif; ?>