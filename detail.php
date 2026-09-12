<?php
// detail.php - CHI TIẾT CÂU LỆNH GIT & KỊCH BẢN THỰC TẾ

// 1. Cơ sở dữ liệu chi tiết các câu lệnh Git
$gitDetails = [
    1 => [
        "title" => "Cấu hình danh tính người dùng",
        "cmd" => "git config --global user.name \"Tên Của Bạn\"\ngit config --global user.email \"email@example.com\"",
        "level" => "basic",
        "category" => "Khởi tạo & Cấu hình",
        "overview" => "Cấu hình thông tin tác giả sẽ gắn liền với tất cả các commit mà bạn tạo ra. Cờ `--global` áp dụng cho toàn bộ dự án trên máy tính của bạn.",
        "flags" => [
            ["flag" => "--global", "desc" => "Áp dụng cấu hình cho tất cả các repository của user hiện tại trên máy."],
            ["flag" => "--local", "desc" => "Chỉ áp dụng cấu hình riêng cho repository hiện tại."],
            ["flag" => "--list", "desc" => "Xem toàn bộ các thông số cấu hình đang có (`git config --list`)."]
        ],
        "workflow" => [
            "Chạy lệnh khi mới cài đặt Git hoặc dựng máy làm việc mới.",
            "Các dịch vụ như GitHub/GitLab dùng Email này để khớp commit với tài khoản của bạn.",
            "Kiểm tra lại danh tính bằng lệnh: `git config user.name` và `git config user.email`."
        ],
        "scenario" => "Bạn commit code nhưng GitHub không hiển thị Avatar của bạn trong lịch sử commit. Lỗi do Email cấu hình trong Git local không khớp với Email đăng ký tài khoản GitHub.",
        "solution" => "Chạy lệnh `git config --global user.email \"email-dung-github@example.com\"` để sửa lại Email chuẩn."
    ],
    8 => [
        "title" => "Tạo và chuyển nhánh (Branching)",
        "cmd" => "git checkout -b feature/login\n# Hoặc cách mới (Git 2.23+):\ngit switch -c feature/login",
        "level" => "intermediate",
        "category" => "Quản lý Nhánh",
        "overview" => "Tạo một nhánh mới tách biệt khỏi nhánh chính (main/master) để phát triển tính năng hoặc sửa lỗi mà không làm ảnh hưởng đến code đang chạy ổn định.",
        "flags" => [
            ["flag" => "-b", "desc" => "Tạo nhánh mới và chuyển ngay sang nhánh đó (dùng với `git checkout`)."],
            ["flag" => "-c", "desc" => "Tạo nhánh mới (Create) và chuyển sang (dùng với `git switch`)."],
            ["flag" => "-a", "desc" => "Liệt kê tất cả các nhánh (cả local và remote) khi dùng `git branch -a`."]
        ],
        "workflow" => [
            "Đảm bảo đang ở nhánh gốc ổn định (thường là `main` hoặc `develop`) và đã `git pull` mới nhất.",
            "Tạo nhánh mới theo quy chuẩn đặt tên (ví dụ: `feature/login`, `fix/bug-header`).",
            "Đẩy nhánh mới lên GitHub/GitLab lần đầu bằng: `git push -u origin <ten-nhanh>`."
        ],
        "scenario" => "Bạn tạo nhánh mới `feature/login`, code xong nhưng trên GitHub không thấy nhánh này đâu.",
        "solution" => "Do lệnh `git checkout -b` chỉ mới tạo nhánh ở máy local. Bạn cần đẩy lên remote bằng lệnh: `git push -u origin feature/login`."
    ],
    17 => [
        "title" => "Git Reflog (Khôi phục dữ liệu nâng cao)",
        "cmd" => "git reflog\ngit reset --hard HEAD@{index}",
        "level" => "advanced",
        "category" => "Nâng cao & Cứu dữ liệu",
        "overview" => "Lưu lại nhật ký mọi hành động thay đổi con trỏ HEAD (commit, checkout, reset, rebase). Đây là 'lưới an toàn' cuối cùng giúp bạn cứu lại các commit lỡ tay bị xóa.",
        "flags" => [
            ["flag" => "reflog show", "desc" => "Hiển thị nhật ký thao tác chi tiết của HEAD."],
            ["flag" => "--hard", "desc" => "Đưa toàn bộ Working Directory và Staging Area về đúng trạng thái commit chọn trong reflog."]
        ],
        "workflow" => [
            "Gõ `git reflog` để xem lại lịch sử hành động gần đây kèm mã chỉ số (vd: `HEAD@{1}`).",
            "Xác định vị trí commit/trạng thái an toàn trước khi xảy ra sự cố.",
            "Khôi phục lại bằng lệnh `git reset --hard HEAD@{n}` hoặc tạo nhánh mới từ điểm đó `git branch rescue-branch HEAD@{n}`."
        ],
        "scenario" => "Bạn lỡ tay gõ `git reset --hard` làm mất sạch các commit vừa làm trong buổi sáng.",
        "solution" => "Gõ `git reflog` để tìm lại SHA-1 hash hoặc vị trí `HEAD@{n}` của commit trước khi reset, sau đó gõ `git reset --hard HEAD@{n}` để lấy lại toàn bộ code."
    ]
];

// Lấy ID task từ URL, mặc định lấy id = 8 nếu không truyền hoặc không tìm thấy
$taskId = isset($_GET['id']) ? (int)$_GET['id'] : 8;
$data = isset($gitDetails[$taskId]) ? $gitDetails[$taskId] : $gitDetails[8];

// Phân loại Badge
$badgeClass = "bg-emerald-500/10 text-emerald-400 border-emerald-500/30";
$levelName = "Cơ bản";
if ($data['level'] === 'intermediate') {
    $badgeClass = "bg-yellow-500/10 text-yellow-400 border-yellow-500/30";
    $levelName = "Trung cấp";
} elseif ($data['level'] === 'advanced') {
    $badgeClass = "bg-rose-500/10 text-rose-400 border-rose-500/30";
    $levelName = "Nâng cao";
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GIT TERMINAL // COMMAND_DETAILS #<?php echo $taskId; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'JetBrains Mono', monospace;
            background-color: #0d1117;
            color: #c9d1d9;
        }

        .cyber-card {
            background-color: rgba(22, 27, 34, 0.8);
            border: 1px solid #30363d;
        }

        .glow-cyan {
            text-shadow: 0 0 10px rgba(56, 189, 248, 0.5);
        }

        .scanline {
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0) 50%, rgba(0, 0, 0, 0.2) 50%, rgba(0, 0, 0, 0.2));
            background-size: 100% 4px;
        }
    </style>
</head>

<body class="min-h-screen pb-12 scanline">

    <!-- HEADER NAVIGATION -->
    <header class="border-b border-gray-800 bg-gray-900/90 backdrop-blur sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <a href="index.php" class="text-gray-400 hover:text-cyan-400 transition flex items-center gap-2 text-xs font-bold border border-gray-700 px-3 py-1.5 rounded bg-gray-800/50">
                    <i class="fa-solid fa-arrow-left"></i> DASHBOARD
                </a>
                <a href="features.php" class="text-gray-400 hover:text-cyan-400 transition flex items-center gap-2 text-xs font-bold border border-gray-700 px-3 py-1.5 rounded bg-gray-800/50">
                    <i class="fa-solid fa-microchip"></i> LAB TOOLS
                </a>
            </div>
            <span class="text-xs text-gray-500 font-mono">TASK_ID: #<?php echo sprintf("%03d", $taskId); ?></span>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 mt-8 space-y-8">

        <!-- TITLE & OVERVIEW SECTION -->
        <section class="cyber-card p-6 rounded-xl border-l-4 border-l-cyan-500">
            <div class="flex flex-wrap justify-between items-start gap-4 mb-3">
                <div>
                    <span class="text-xs text-gray-500 uppercase tracking-widest block mb-1"><?php echo $data['category']; ?></span>
                    <h1 class="text-2xl font-bold text-white tracking-wide glow-cyan"><?php echo $data['title']; ?></h1>
                </div>
                <span class="text-xs font-bold px-3 py-1 rounded-full border <?php echo $badgeClass; ?>">
                    <?php echo $levelName; ?>
                </span>
            </div>
            <p class="text-sm text-gray-300 leading-relaxed mt-4 bg-black/30 p-4 rounded border border-gray-800/60">
                <i class="fa-solid fa-circle-info text-cyan-400 mr-2"></i><?php echo $data['overview']; ?>
            </p>
        </section>

        <!-- COMMAND BLOCK -->
        <section class="cyber-card p-6 rounded-xl">
            <div class="flex justify-between items-center mb-3">
                <h2 class="text-xs font-bold text-cyan-400 uppercase tracking-wider">// CÂU LỆNH CHUẨN (TERMINAL COMMAND)</h2>
                <button onclick="copyCmd()" class="text-xs bg-cyan-500/20 text-cyan-300 hover:bg-cyan-500/40 px-3 py-1.5 rounded border border-cyan-500/40 transition">
                    <i class="fa-regular fa-copy mr-1"></i> Sao chép lệnh
                </button>
            </div>
            <div class="bg-black p-4 rounded-lg border border-gray-800 relative group">
                <pre id="cmdText" class="text-sm font-mono text-cyan-300 whitespace-pre-wrap leading-relaxed"><?php echo htmlspecialchars($data['cmd']); ?></pre>
            </div>
        </section>

        <!-- FLAGS & PARAMETERS -->
        <section class="cyber-card p-6 rounded-xl">
            <h2 class="text-xs font-bold text-yellow-400 uppercase tracking-wider mb-4">// CÁC THAM SỐ & CỜ MỞ RỘNG (FLAGS)</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <?php foreach ($data['flags'] as $item): ?>
                    <div class="bg-black/50 p-3.5 rounded border border-gray-800/80">
                        <code class="text-xs font-bold text-yellow-300 bg-yellow-950/40 px-2 py-0.5 rounded border border-yellow-800/50 block w-fit mb-2">
                            <?php echo $item['flag']; ?>
                        </code>
                        <p class="text-xs text-gray-400 leading-normal"><?php echo $item['desc']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- RECOMMENDED WORKFLOW -->
            <section class="cyber-card p-6 rounded-xl">
                <h2 class="text-xs font-bold text-emerald-400 uppercase tracking-wider mb-4">// QUY TRÌNH THỰC HIỆN CHUẨN (WORKFLOW)</h2>
                <ol class="space-y-3">
                    <?php foreach ($data['workflow'] as $index => $step): ?>
                        <li class="flex items-start text-xs text-gray-300 leading-relaxed">
                            <span class="flex-shrink-0 w-6 h-6 rounded bg-emerald-500/10 border border-emerald-500/40 text-emerald-400 font-bold flex items-center justify-center mr-3 mt-0.5">
                                <?php echo $index + 1; ?>
                            </span>
                            <span class="pt-1"><?php echo $step; ?></span>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </section>

            <!-- TROUBLESHOOTING & SCENARIO -->
            <section class="cyber-card p-6 rounded-xl border-l-4 border-l-rose-500">
                <h2 class="text-xs font-bold text-rose-400 uppercase tracking-wider mb-4">// TÌNH HUỐNG LỖI THỰC TẾ & CÁCH XỬ LÝ</h2>
                <div class="space-y-4">
                    <div class="bg-rose-950/20 p-3.5 rounded border border-rose-900/40">
                        <span class="text-[10px] text-rose-400 font-bold uppercase block mb-1"><i class="fa-solid fa-bug mr-1"></i>Sự cố thường gặp:</span>
                        <p class="text-xs text-gray-300 italic"><?php echo $data['scenario']; ?></p>
                    </div>
                    <div class="bg-emerald-950/20 p-3.5 rounded border border-emerald-900/40">
                        <span class="text-[10px] text-emerald-400 font-bold uppercase block mb-1"><i class="fa-solid fa-key mr-1"></i>Giải pháp khắc phục:</span>
                        <p class="text-xs text-emerald-300 font-mono"><?php echo $data['solution']; ?></p>
                    </div>
                </div>
            </section>
        </div>

    </main>

    <!-- TOAST NOTIFICATION -->
    <div id="toast" class="fixed bottom-5 right-5 bg-cyan-500 text-black font-bold px-4 py-3 rounded-lg shadow-lg text-xs transform translate-y-20 opacity-0 transition-all duration-300 flex items-center gap-2 z-50">
        <i class="fa-solid fa-circle-check text-base"></i>
        <span>Đã sao chép câu lệnh vào bộ nhớ tạm!</span>
    </div>

    <script>
        function copyCmd() {
            const code = document.getElementById('cmdText').innerText;
            navigator.clipboard.writeText(code).then(() => {
                const toast = document.getElementById('toast');
                toast.classList.remove('translate-y-20', 'opacity-0');
                setTimeout(() => {
                    toast.classList.add('translate-y-20', 'opacity-0');
                }, 2500);
            });
        }
    </script>
</body>

</html>