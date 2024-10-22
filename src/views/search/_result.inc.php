<?php if (!empty($data['schedules'])): ?>
    <ul class="space-y-4">
        <!-- TO DO: ubah style jika ticket sudah habis atau ticket yang tersisa < ticket yang diminta maka ubah style nya -->
        <?php foreach ($data['schedules'] as $schedule): ?>
            <div class="bg-[#f5b041] py-6 ">
                <li class="bg-white p-8 shadow-lg">
                    <div class="flex justify-between px-10">
                        <div class="ml-10">
                            <p class="italic text-[40px]"><i class="bi bi-train-front"></i> Tiket Joyo</p>
                            <p class="text-lg font-semibold">Kereta : <?= $schedule['name']; ?></p>
                        </div>
                        <div class="self-center text-[60px] mr-10">
                            <i class="bi bi-qr-code"></i>
                        </div>
                    </div>
                    <hr class="my-2" style="border-color: #f5b041; border-width: 2px">
                    <div class="flex justify-around text-[20px]">
                        <div>
                            <p>Berangkat: <?= $schedule['from_name']; ?>, <?= $schedule['from_city']; ?></p>
                            <p>Jam keberangkatan: <?= date('H:i', strtotime($schedule['departure_time'])); ?></p>
                            <p>Tempat Duduk Tersisa: <?= $schedule['seats_left']; ?></p>
                        </div>
                        <div>
                            <p>Tiba: <?= $schedule['to_name']; ?>, <?= $schedule['to_city']; ?></p>
                            <p>Harga: <?= $schedule['price']; ?></p>
                            <p>Durasi: <?= date('H:i', strtotime($schedule['arrival_time'])); ?></p>
                        </div>
                        <div class="mt-[-30px] mr-[-140px]">
                            <form action="/reservation" method="POST" class="mt-4">
                                <input type="hidden" name="schedule_id" value="<?= $schedule['id']; ?>">
                                <input type="hidden" name="tickets" value="<?= $data['tickets']; ?>">
                                <input type="hidden" name="user_id" value="<?= $_SESSION["user"]["id"] ?? null ?>">
                                <button type="submit" class="text-black rounded-lg transition h-[140px] w-[200px] text-[50px] ">
                                <i class="bi bi-box-arrow-right "></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            </div>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p class="text-center text-white italic mt-6">No available trains for the selected route and date.</p>
<?php endif; ?>