<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موسوعة الأذكار | عداد الأذكار اليومية</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #3b82f6;
            --secondary-color: #10b981;
            --accent-color: #f59e0b;
            --danger-color: #ef4444;
            --light-color: #f8fafc;
            --dark-color: #1e293b;
            --gray-color: #64748b;
            --gray-light: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', 'Cairo', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            color: #334155;
            line-height: 1.6;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* تحسين الخطوط للعربية */
        .arabic-text {
            font-family: 'Amiri', 'Lateef', 'Segoe UI', sans-serif;
            font-size: 1.5rem;
            line-height: 1.9;
            text-align: center;
            margin: 1rem 0;
            color: #1e293b;
            font-weight: 500;
        }

        /* تصميم الهيدر */
        .main-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 2.5rem 0;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .main-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.08'%3E%3Cpath d='M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10zm10 8c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm40 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .logo-icon {
            background: rgba(255, 255, 255, 0.2);
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 1.5rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* تصميم بطاقة المجموع الكلي */
        .total-counter-card {
            background: linear-gradient(135deg, white 0%, #f8fafc 100%);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 2.5rem;
            border: 1px solid rgba(37, 99, 235, 0.1);
        }

        .total-counter-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        .total-count {
            font-size: 3.5rem;
            font-weight: 900;
            color: var(--primary-color);
            line-height: 1;
            text-shadow: 0 2px 10px rgba(37, 99, 235, 0.2);
        }

        /* تصميم تبويبات التصنيفات */
        .category-nav-container {
            background: white;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
            margin-bottom: 2.5rem;
            padding: 1.2rem;
            position: sticky;
            top: 15px;
            z-index: 100;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .category-nav {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 0.8rem;
        }

        .category-btn {
            background: var(--gray-light);
            border: none;
            color: var(--dark-color);
            padding: 0.7rem 1.5rem;
            border-radius: 30px;
            font-weight: 700;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .category-btn:hover {
            background: var(--primary-light);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(37, 99, 235, 0.2);
        }

        .category-btn.active {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.3);
        }

        /* تصميم بطاقات الأذكار */
        .azkar-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        @media (max-width: 768px) {
            .azkar-container {
                grid-template-columns: 1fr;
            }
        }

        .zikr-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--gray-light);
            transition: all 0.4s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .zikr-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        .zikr-card-header {
            background: linear-gradient(to right, var(--primary-color), var(--primary-light));
            color: white;
            padding: 1.5rem;
            position: relative;
        }

        .zikr-card-title {
            font-size: 1.4rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .zikr-card-category {
            background: rgba(255, 255, 255, 0.25);
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            display: inline-block;
            backdrop-filter: blur(5px);
            font-weight: 600;
        }

        .zikr-card-id {
            position: absolute;
            top: 1.2rem;
            left: 1.2rem;
            background: rgba(255, 255, 255, 0.25);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            backdrop-filter: blur(5px);
        }

        .zikr-card-body {
            padding: 1.8rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .zikr-text-container {
            flex-grow: 1;
        }

        .zikr-translation {
            color: var(--gray-color);
            font-size: 1rem;
            margin-top: 1rem;
            text-align: center;
            font-style: italic;
            padding: 1rem;
            background: #f8fafc;
            border-radius: 12px;
            border-right: 3px solid var(--primary-light);
        }

        .zikr-benefit {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            padding: 1.2rem;
            border-radius: 12px;
            margin-top: 1.2rem;
            font-size: 0.95rem;
            border-right: 4px solid var(--primary-color);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
        }

        .zikr-benefit i {
            color: var(--primary-color);
            margin-left: 0.5rem;
            font-size: 1.1rem;
        }

        /* تصميم عداد الأذكار */
        .counter-section {
            margin-top: 1.8rem;
            padding-top: 1.8rem;
            border-top: 2px dashed var(--gray-light);
        }

        .counter-display {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .counter-number {
            font-size: 2.8rem;
            font-weight: 900;
            color: var(--primary-color);
            line-height: 1;
            text-shadow: 0 2px 8px rgba(37, 99, 235, 0.2);
        }

        .counter-total {
            color: var(--gray-color);
            font-size: 1rem;
            margin-top: 0.5rem;
            font-weight: 600;
        }

        .progress-container {
            margin-bottom: 1.5rem;
        }

        .progress {
            height: 12px;
            border-radius: 10px;
            background-color: #e2e8f0;
            overflow: hidden;
        }

        .progress-bar {
            background: linear-gradient(to right, var(--primary-light), var(--primary-color));
            border-radius: 10px;
            transition: width 0.6s ease;
        }

        .counter-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }

        .counter-btn {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .counter-btn:active {
            transform: scale(0.92);
        }

        .btn-increment {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: white;
        }

        .btn-increment:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
        }

        .btn-decrement {
            background: white;
            color: var(--dark-color);
            border: 2px solid #cbd5e1;
        }

        .btn-decrement:hover {
            background: #f1f5f9;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .btn-reset {
            background: white;
            color: var(--danger-color);
            border: 2px solid #fecaca;
            border-radius: 30px;
            padding: 0.7rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.1);
        }

        .btn-reset:hover {
            background: #fee2e2;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(239, 68, 68, 0.2);
        }

        .btn-favorite {
            background: white;
            color: #d97706;
            border: 2px solid #fde68a;
            border-radius: 30px;
            padding: 0.7rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.1);
        }

        .btn-favorite.active {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            color: white;
            border-color: #f59e0b;
        }

        .btn-favorite:hover {
            background: #fef3c7;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(245, 158, 11, 0.2);
        }

        /* تصميم الإحصائيات */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: white;
            border-radius: 18px;
            padding: 1.8rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
            text-align: center;
            border-top: 5px solid var(--primary-color);
            transition: transform 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--primary-color);
            line-height: 1;
            margin-bottom: 0.8rem;
        }

        .stat-label {
            color: var(--gray-color);
            font-size: 1rem;
            font-weight: 700;
        }

        /* تصميم شريط البحث */
        .search-container {
            margin-bottom: 2.5rem;
        }

        .search-box {
            position: relative;
            max-width: 600px;
            margin: 0 auto;
        }

        .search-input {
            width: 100%;
            padding: 1.2rem 1.8rem;
            border-radius: 20px;
            border: 2px solid var(--gray-light);
            font-size: 1.1rem;
            background: white;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-light);
            box-shadow: 0 8px 30px rgba(37, 99, 235, 0.15);
        }

        .search-btn {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 6px 15px rgba(37, 99, 235, 0.3);
        }

        .search-btn:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
        }

        /* تصميم الفوتر */
        .main-footer {
            background: linear-gradient(135deg, var(--dark-color) 0%, #0f172a 100%);
            color: white;
            padding: 3rem 0;
            margin-top: 5rem;
            position: relative;
        }

        .main-footer::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        }

        .footer-content {
            text-align: center;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 2rem;
        }

        .footer-link {
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .footer-link:hover {
            color: white;
            transform: translateY(-2px);
        }

        /* تصميم شارة الإكمال */
        .completion-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, var(--secondary-color), #34d399);
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
            z-index: 2;
        }

        /* تصميم حالة عدم وجود نتائج */
        .no-results {
            text-align: center;
            padding: 5rem 2rem;
            grid-column: 1 / -1;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
            margin: 2rem 0;
        }

        .no-results-icon {
            font-size: 5rem;
            color: var(--gray-light);
            margin-bottom: 2rem;
            opacity: 0.5;
        }

        /* تحسينات للأجهزة المحمولة */
        @media (max-width: 576px) {
            .main-header {
                padding: 2rem 0;
            }

            .total-count {
                font-size: 2.8rem;
            }

            .arabic-text {
                font-size: 1.3rem;
            }

            .category-nav {
                justify-content: flex-start;
                overflow-x: auto;
                padding-bottom: 0.8rem;
                gap: 0.5rem;
            }

            .category-btn {
                white-space: nowrap;
                padding: 0.6rem 1.2rem;
                font-size: 0.9rem;
            }

            .azkar-container {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .stats-container {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .counter-number {
                font-size: 2.5rem;
            }

            .counter-btn {
                width: 50px;
                height: 50px;
            }

            .footer-links {
                flex-direction: column;
                gap: 1rem;
            }

            .zikr-card-header,
            .zikr-card-body {
                padding: 1.2rem;
            }
        }

        /* تحسينات للأجهزة اللوحية */
        @media (min-width: 577px) and (max-width: 992px) {
            .azkar-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* أنيميشن بسيطة */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.6s ease forwards;
        }

        /* تحسينات للوضع الداكن */
        @media (prefers-color-scheme: dark) {
            body {
                background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
                color: #cbd5e1;
            }

            .zikr-card,
            .total-counter-card,
            .category-nav-container,
            .stat-card {
                background-color: #1e293b;
                border-color: #334155;
            }

            .total-counter-card {
                background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            }

            .zikr-translation {
                background-color: #334155;
                color: #94a3b8;
            }

            .zikr-benefit {
                background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
                border-right-color: #3b82f6;
            }

            .search-input {
                background-color: #1e293b;
                border-color: #475569;
                color: #cbd5e1;
            }

            .btn-decrement {
                background-color: #334155;
                border-color: #475569;
                color: #cbd5e1;
            }

            .btn-decrement:hover {
                background-color: #475569;
            }

            .category-btn {
                background-color: #334155;
                color: #cbd5e1;
            }

            .arabic-text {
                color: #e2e8f0;
            }

            .progress {
                background-color: #334155;
            }

            .no-results {
                background-color: #1e293b;
            }
        }

        /* تأثيرات إضافية */
        .reward-badge {
            position: absolute;
            bottom: -10px;
            right: 20px;
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            color: #78350f;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(245, 158, 11, 0.3);
            z-index: 1;
        }

        .highlight {
            background: linear-gradient(120deg, rgba(255, 245, 0, 0.3) 0%, rgba(255, 245, 0, 0) 100%);
            padding: 0.2rem 0.5rem;
            border-radius: 5px;
        }

        /* تصميم زر المشاركة */
        .share-btn {
            position: fixed;
            bottom: 30px;
            left: 30px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
            z-index: 1000;
            transition: all 0.3s ease;
            border: none;
        }

        .share-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.4);
        }

        @media (max-width: 768px) {
            .share-btn {
                bottom: 20px;
                left: 20px;
                width: 55px;
                height: 55px;
            }
        }
    </style>
</head>

<body>
    <!-- الهيدر الرئيسي -->
    <header class="main-header">
        <div class="container header-content">
            <div class="logo-container">
                <div class="logo-icon">
                    <i class="bi bi-journal-bookmark-fill" style="font-size: 2.8rem;"></i>
                </div>
                <div>
                    <h1 class="display-5 fw-bold mb-2">موسوعة الأذكار</h1>
                    <p class="lead mb-0">أذكار ترفع الحسنات وتضاعف الأجر مع عداد ذكي</p>
                </div>
            </div>
        </div>
    </header>

    <!-- المحتوى الرئيسي -->
    <main class="container py-5">
        <!-- بطاقة المجموع الكلي -->
        <div class="total-counter-card fade-in">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3 class="mb-2"><i class="bi bi-trophy me-2"></i>المجموع الكلي للأذكار</h3>
                    <p class="text-muted mb-0">إجمالي الحسنات التي رفعتها اليوم</p>
                </div>
                <div class="col-md-4 text-center text-md-end">
                    <div class="total-count" id="totalCount">0</div>
                    <button class="btn btn-outline-light btn-lg mt-3 px-4" id="resetAll">
                        <i class="bi bi-arrow-clockwise me-2"></i>إعادة تعيين الكل
                    </button>
                </div>
            </div>
        </div>

        <!-- الإحصائيات -->
        <div class="stats-container fade-in">
            <div class="stat-card">
                <div class="stat-value" id="statTotal">50</div>
                <div class="stat-label">إجمالي الأذكار</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" id="statCompleted">0</div>
                <div class="stat-label">مكتملة اليوم</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" id="statProgress">0%</div>
                <div class="stat-label">نسبة الإنجاز</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" id="statFavorites">0</div>
                <div class="stat-label">المفضلة</div>
            </div>
        </div>

        <!-- شريط البحث -->
        <div class="search-container fade-in">
            <div class="search-box">
                <input type="text" class="search-input" placeholder="ابحث في الأذكار بالنص أو الفضل..."
                    id="searchInput">
                <button class="search-btn" id="searchButton">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>

        <!-- تبويبات التصنيفات -->
        <div class="category-nav-container fade-in">
            <div class="category-nav" id="categoryNav">
                <!-- سيتم إنشاء الأزرار بواسطة JavaScript -->
            </div>
        </div>

        <!-- حاوية الأذكار -->
        <div class="azkar-container" id="azkarContainer">
            <!-- سيتم ملء الأذكار بواسطة JavaScript -->
        </div>

        <!-- رسالة عدم وجود نتائج -->
        <div class="no-results d-none" id="noResults">
            <div class="no-results-icon">
                <i class="bi bi-search"></i>
            </div>
            <h4 class="mb-2">لا توجد أذكار مطابقة للبحث</h4>
            <p class="text-muted">حاول تغيير كلمات البحث أو اختر تصنيفاً مختلفاً</p>
        </div>
    </main>

    <!-- زر المشاركة -->
    <button class="share-btn" id="shareBtn" title="شارك الأجر">
        <i class="bi bi-share-fill"></i>
    </button>

    <!-- الفوتر -->
    <footer class="main-footer">
        <div class="container">
            <div class="footer-content">
                <h4 class="mb-3">موسوعة الأذكار مع عداد</h4>
                <p class="mb-0">هذه الأذكار جمعت من مصادر موثوقة من السنة النبوية والكتب الإسلامية المعتمدة</p>
                <div class="footer-links">
                    <a href="#" class="footer-link">الصفحة الرئيسية</a>
                    <a href="https://wa.me/966560637609" class="footer-link" target="_blank">
                        تواصل معنا عبر واتساب
                    </a>
                </div>
                <p class="mt-4 mb-0">جميع الحقوق محفوظة &copy; <span id="currentYear"></span></p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // بيانات الأذكار الكاملة (50 ذكر)
        const azkar = [
            {
                id: 1,
                category: "الصباح",
                title: "سُبْحَانَ اللَّهِ وَبِحَمْدِهِ",
                text: "سُبْحَانَ اللَّهِ وَبِحَمْدِهِ",
                translation: "سبحان الله وبحمده",
                benefit: "من قالها مائة مرة حين يصبح غفرت له ذنوبه وإن كانت مثل زبد البحر، وهي تملأ الميزان",
                maxCount: 100,
                currentCount: 0,
                favorite: true,
                reward: "حسنة والحسنة بعشر أمثالها"
            },
            {
                id: 2,
                category: "الصباح",
                title: "لا إله إلا الله وحده لا شريك له",
                text: "لا إله إلا الله وحده لا شريك له، له الملك وله الحمد، وهو على كل شيء قدير",
                translation: "لا إله إلا الله وحده لا شريك له، له الملك وله الحمد، وهو على كل شيء قدير",
                benefit: "من قالها عشر مرات حين يصبح كُتب له بها مائة حسنة، ومحيت عنه مائة سيئة، وكانت له حرزاً من الشيطان حتى يمسي",
                maxCount: 10,
                currentCount: 0,
                favorite: true,
                reward: "100 حسنة ومحو 100 سيئة"
            },
            {
                id: 3,
                category: "الصباح",
                title: "اللَّهُمَّ أَنْتَ رَبِّي لا إِلَهَ إِلا أَنْتَ",
                text: "اللَّهُمَّ أَنْتَ رَبِّي لا إِلَهَ إِلا أَنْتَ، خَلَقْتَنِي وَأَنَا عَبْدُكَ، وَأَنَا عَلَى عَهْدِكَ وَوَعْدِكَ مَا اسْتَطَعْتُ، أَعُوذُ بِكَ مِنْ شَرِّ مَا صَنَعْتُ، أَبُوءُ لَكَ بِنِعْمَتِكَ عَلَيَّ، وَأَبُوءُ بِذَنْبِي فَاغْفِرْ لِي فَإِنَّهُ لا يَغْفِرُ الذُّنُوبَ إِلا أَنْتَ",
                translation: "اللهم أنت ربي لا إله إلا أنت، خلقتني وأنا عبدك، وأنا على عهدك ووعدك ما استطعت، أعوذ بك من شر ما صنعت، أبوء لك بنعمتك علي، وأبوء بذنبي فاغفر لي فإنه لا يغفر الذنوب إلا أنت",
                benefit: "من قالها حين يصبح موقناً بها فمات من يومه دخل الجنة، ومن قالها حين يمسي موقناً بها فمات من ليلته دخل الجنة",
                maxCount: 1,
                currentCount: 0,
                favorite: true,
                reward: "دخول الجنة"
            },
            {
                id: 4,
                category: "الصباح",
                title: "اللَّهُمَّ إِنِّي أَصْبَحْتُ أُشْهِدُكَ",
                text: "اللَّهُمَّ إِنِّي أَصْبَحْتُ أُشْهِدُكَ، وَأُشْهِدُ حَمَلَةَ عَرْشِكَ، وَمَلائِكَتَكَ، وَجَمِيعَ خَلْقِكَ، أَنَّكَ أَنْتَ اللَّهُ لا إِلَهَ إِلا أَنْتَ، وَأَنَّ مُحَمَّدًا عَبْدُكَ وَرَسُولُكَ",
                translation: "اللهم إني أصبحت أشهدك، وأشهد حملة عرشك، وملائكتك، وجميع خلقك، أنك أنت الله لا إله إلا أنت، وأن محمداً عبدك ورسولك",
                benefit: "من قالها حين يصبح أربع مرات أعتقه الله من النار",
                maxCount: 4,
                currentCount: 0,
                favorite: false,
                reward: "عتق من النار"
            },
            {
                id: 5,
                category: "الصباح",
                title: "اللَّهُمَّ مَا أَصْبَحَ بِي مِنْ نِعْمَةٍ",
                text: "اللَّهُمَّ مَا أَصْبَحَ بِي مِنْ نِعْمَةٍ أَوْ بِأَحَدٍ مِنْ خَلْقِكَ فَمِنْكَ وَحْدَكَ لا شَرِيكَ لَكَ، فَلَكَ الْحَمْدُ وَلَكَ الشُّكْرُ",
                translation: "اللهم ما أصبح بي من نعمة أو بأحد من خلقك فمنك وحدك لا شريك لك، فلك الحمد ولك الشكر",
                benefit: "من قالها حين يصبح فقد أدى شكر يومه",
                maxCount: 1,
                currentCount: 0,
                favorite: false,
                reward: "أداء شكر النعم"
            },
            {
                id: 6,
                category: "الصباح",
                title: "اللَّهُمَّ عَافِنِي فِي بَدَنِي",
                text: "اللَّهُمَّ عَافِنِي فِي بَدَنِي، اللَّهُمَّ عَافِنِي فِي سَمْعِي، اللَّهُمَّ عَافِنِي فِي بَصَرِي، لا إِلَهَ إِلا أَنْتَ",
                translation: "اللهم عافني في بدني، اللهم عافني في سمعي، اللهم عافني في بصري، لا إله إلا أنت",
                benefit: "دعاء جامع للعافية في البدن والسمع والبصر",
                maxCount: 3,
                currentCount: 0,
                favorite: true,
                reward: "العافية في البدن والسمع والبصر"
            },
            {
                id: 7,
                category: "الصباح",
                title: "حَسْبِيَ اللَّهُ لا إِلَهَ إِلا هُوَ",
                text: "حَسْبِيَ اللَّهُ لا إِلَهَ إِلا هُوَ، عَلَيْهِ تَوَكَّلْتُ، وَهُوَ رَبُّ الْعَرْشِ الْعَظِيمِ",
                translation: "حسبي الله لا إله إلا هو، عليه توكلت، وهو رب العرش العظيم",
                benefit: "من قالها سبع مرات حين يصبح وحين يمسي كفاه الله ما أهمه من أمر الدنيا والآخرة",
                maxCount: 7,
                currentCount: 0,
                favorite: false,
                reward: "الكفاية من هموم الدنيا والآخرة"
            },
            {
                id: 8,
                category: "الصباح",
                title: "أَعُوذُ بِكَلِمَاتِ اللَّهِ التَّامَّاتِ",
                text: "أَعُوذُ بِكَلِمَاتِ اللَّهِ التَّامَّاتِ مِنْ شَرِّ مَا خَلَقَ",
                translation: "أعوذ بكلمات الله التامات من شر ما خلق",
                benefit: "من قالها ثلاثاً حين يصبح لم يضره شيء حتى يمسي",
                maxCount: 3,
                currentCount: 0,
                favorite: false,
                reward: "التحصين من الشرور"
            },
            {
                id: 9,
                category: "الصباح",
                title: "بِسْمِ اللَّهِ الَّذِي لا يَضُرُّ مَعَ اسْمِهِ شَيْءٌ",
                text: "بِسْمِ اللَّهِ الَّذِي لا يَضُرُّ مَعَ اسْمِهِ شَيْءٌ فِي الأَرْضِ وَلا فِي السَّمَاءِ وَهُوَ السَّمِيعُ الْعَلِيمُ",
                translation: "بسم الله الذي لا يضر مع اسمه شيء في الأرض ولا في السماء وهو السميع العليم",
                benefit: "من قالها ثلاثاً حين يصبح لم يضره شيء حتى يمسي",
                maxCount: 3,
                currentCount: 0,
                favorite: true,
                reward: "التحصين من الأضرار"
            },
            {
                id: 10,
                category: "الصباح",
                title: "رَضِيتُ بِاللَّهِ رَبًّا",
                text: "رَضِيتُ بِاللَّهِ رَبًّا، وَبِالإِسْلامِ دِينًا، وَبِمُحَمَّدٍ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ نَبِيًّا",
                translation: "رضيت بالله رباً، وبالإسلام ديناً، وبمحمد صلى الله عليه وسلم نبياً",
                benefit: "من قالها ثلاثاً حين يصبح وحين يمسي كان حقاً على الله أن يرضيه يوم القيامة",
                maxCount: 3,
                currentCount: 0,
                favorite: true,
                reward: "الرضا من الله يوم القيامة"
            },
            {
                id: 11,
                category: "المساء",
                title: "آية الكرسي",
                text: "اللَّهُ لاَ إِلَهَ إِلاَّ هُوَ الْحَيُّ الْقَيُّومُ لاَ تَأْخُذُهُ سِنَةٌ وَلاَ نَوْمٌ لَهُ مَا فِي السَّمَاوَاتِ وَمَا فِي الأَرْضِ مَنْ ذَا الَّذِي يَشْفَعُ عِنْدَهُ إِلاَّ بِإِذْنِهِ يَعْلَمُ مَا بَيْنَ أَيْدِيهِمْ وَمَا خَلْفَهُمْ وَلاَ يُحِيطُونَ بِشَيْءٍ مِنْ عِلْمِهِ إِلاَّ بِمَا شَاءَ وَسِعَ كُرْسِيُّهُ السَّمَاوَاتِ وَالأَرْضَ وَلاَ يَئُودُهُ حِفْظُهُمَا وَهُوَ الْعَلِيُّ الْعَظِيمُ",
                translation: "الله لا إله إلا هو الحي القيوم، لا تأخذه سنة ولا نوم، له ما في السماوات وما في الأرض، من ذا الذي يشفع عنده إلا بإذنه، يعلم ما بين أيديهم وما خلفهم، ولا يحيطون بشيء من علمه إلا بما شاء، وسع كرسيه السماوات والأرض، ولا يؤوده حفظهما، وهو العلي العظيم",
                benefit: "من قرأها حين يمسي أجير من الجن حتى يصبح، ومن قرأها حين يصبح أجير من الجن حتى يمسي",
                maxCount: 1,
                currentCount: 0,
                favorite: true,
                reward: "حفظ من الجن"
            },
            {
                id: 12,
                category: "المساء",
                title: "سُبْحَانَ اللَّهِ",
                text: "سُبْحَانَ اللَّهِ",
                translation: "سبحان الله",
                benefit: "كلمتان خفيفتان على اللسان، ثقيلتان في الميزان، حبيبتان إلى الرحمن",
                maxCount: 33,
                currentCount: 0,
                favorite: false,
                reward: "ثقيلتان في الميزان"
            },
            {
                id: 13,
                category: "المساء",
                title: "الْحَمْدُ لِلَّهِ",
                text: "الْحَمْدُ لِلَّهِ",
                translation: "الحمد لله",
                benefit: "تملأ ميزان العبد بالحسنات",
                maxCount: 33,
                currentCount: 0,
                favorite: false,
                reward: "تملأ الميزان"
            },
            {
                id: 14,
                category: "المساء",
                title: "اللَّهُ أَكْبَرُ",
                text: "اللَّهُ أَكْبَرُ",
                translation: "الله أكبر",
                benefit: "تملأ ما بين السماوات والأرض",
                maxCount: 34,
                currentCount: 0,
                favorite: false,
                reward: "تملأ ما بين السماوات والأرض"
            },
            {
                id: 15,
                category: "المساء",
                title: "لا إله إلا الله وحده لا شريك له",
                text: "لا إله إلا الله وحده لا شريك له، له الملك وله الحمد، وهو على كل شيء قدير",
                translation: "لا إله إلا الله وحده لا شريك له، له الملك وله الحمد، وهو على كل شيء قدير",
                benefit: "من قالها عشر مرات حين يمسي كُتب له بها مائة حسنة، ومحيت عنه مائة سيئة، وكانت له حرزاً من الشيطان حتى يصبح",
                maxCount: 10,
                currentCount: 0,
                favorite: true,
                reward: "100 حسنة ومحو 100 سيئة"
            },
            {
                id: 16,
                category: "المساء",
                title: "سُبْحَانَ اللَّهِ وَبِحَمْدِهِ",
                text: "سُبْحَانَ اللَّهِ وَبِحَمْدِهِ، عَدَدَ خَلْقِهِ، وَرِضَا نَفْسِهِ، وَزِنَةَ عَرْشِهِ، وَمِدَادَ كَلِمَاتِهِ",
                translation: "سبحان الله وبحمده، عدد خلقه، ورضا نفسه، وزنة عرشه، ومداد كلماته",
                benefit: "ثواب عظيم لا يتخيله عقل",
                maxCount: 3,
                currentCount: 0,
                favorite: true,
                reward: "أجر عظيم"
            },
            {
                id: 17,
                category: "المساء",
                title: "اللَّهُمَّ بِكَ أَمْسَيْنَا",
                text: "اللَّهُمَّ بِكَ أَمْسَيْنَا، وَبِكَ أَصْبَحْنَا، وَبِكَ نَحْيَا، وَبِكَ نَمُوتُ، وَإِلَيْكَ النُّشُورُ",
                translation: "اللهم بك أمسينا، وبك أصبحنا، وبك نحيا، وبك نموت، وإليك النشور",
                benefit: "إقرار بتوحيد الربوبية والاستسلام لله",
                maxCount: 1,
                currentCount: 0,
                favorite: false,
                reward: "التوحيد والاستسلام لله"
            },
            {
                id: 18,
                category: "المساء",
                title: "اللَّهُمَّ أَنْتَ رَبِّي لا إِلَهَ إِلا أَنْتَ",
                text: "اللَّهُمَّ أَنْتَ رَبِّي لا إِلَهَ إِلا أَنْتَ، عَلَيْكَ تَوَكَّلْتُ، وَأَنْتَ رَبُّ الْعَرْشِ الْعَظِيمِ",
                translation: "اللهم أنت ربي لا إله إلا أنت، عليك توكلت، وأنت رب العرش العظيم",
                benefit: "من قالها حين يمسي فأصابه في ليلته طامة، لم تضره",
                maxCount: 1,
                currentCount: 0,
                favorite: false,
                reward: "التحصين من الطامة"
            },
            {
                id: 19,
                category: "المساء",
                title: "اللَّهُمَّ إِنِّي أَسْأَلُكَ خَيْرَ هَذِهِ اللَّيْلَةِ",
                text: "اللَّهُمَّ إِنِّي أَسْأَلُكَ خَيْرَ هَذِهِ اللَّيْلَةِ، وَأَعُوذُ بِكَ مِنْ شَرِّ هَذِهِ اللَّيْلَةِ، وَشَرِّ مَا بَعْدَهَا",
                translation: "اللهم إني أسألك خير هذه الليلة، وأعوذ بك من شر هذه الليلة، وشر ما بعدها",
                benefit: "سؤال الخير والاستعاذة من الشر",
                maxCount: 1,
                currentCount: 0,
                favorite: false,
                reward: "سؤال الخير والاستعاذة من الشر"
            },
            {
                id: 20,
                category: "المساء",
                title: "أَمْسَيْنَا وَأَمْسَى الْمُلْكُ لِلَّهِ",
                text: "أَمْسَيْنَا وَأَمْسَى الْمُلْكُ لِلَّهِ، وَالْحَمْدُ لِلَّهِ، لا إِلَهَ إِلا اللَّهُ وَحْدَهُ لا شَرِيكَ لَهُ",
                translation: "أمسينا وأمسى الملك لله، والحمد لله، لا إله إلا الله وحده لا شريك له",
                benefit: "من قالها كان له كعدل رقبة من ولد إسماعيل",
                maxCount: 1,
                currentCount: 0,
                favorite: false,
                reward: "كعدل عتق رقبة"
            },
            {
                id: 21,
                category: "بعد الصلاة",
                title: "أستغفر الله",
                text: "أستغفر الله",
                translation: "أستغفر الله",
                benefit: "مفيدة للمغفرة وتكفير الذنوب",
                maxCount: 3,
                currentCount: 0,
                favorite: false,
                reward: "المغفرة"
            },
            {
                id: 22,
                category: "بعد الصلاة",
                title: "اللَّهُمَّ أَنْتَ السَّلَامُ",
                text: "اللَّهُمَّ أَنْتَ السَّلَامُ، وَمِنْكَ السَّلَامُ، تَبَارَكْتَ يَا ذَا الْجَلَالِ وَالْإِكْرَامِ",
                translation: "اللهم أنت السلام، ومنك السلام، تباركت يا ذا الجلال والإكرام",
                benefit: "من قالها بعد الصلاة حلت له مغفرة الله",
                maxCount: 1,
                currentCount: 0,
                favorite: false,
                reward: "المغفرة"
            },
            {
                id: 23,
                category: "بعد الصلاة",
                title: "لا إله إلا الله وحده لا شريك له",
                text: "لا إله إلا الله وحده لا شريك له، له الملك وله الحمد، وهو على كل شيء قدير",
                translation: "لا إله إلا الله وحده لا شريك له، له الملك وله الحمد، وهو على كل شيء قدير",
                benefit: "من قالها بعد كل صلاة عشر مرات كتب الله له بها مائة حسنة، ومحا عنه مائة سيئة",
                maxCount: 10,
                currentCount: 0,
                favorite: true,
                reward: "100 حسنة ومحو 100 سيئة"
            },
            {
                id: 24,
                category: "بعد الصلاة",
                title: "سُبْحَانَ اللَّهِ",
                text: "سُبْحَانَ اللَّهِ",
                translation: "سبحان الله",
                benefit: "من سبح الله بعد كل صلاة ثلاثاً وثلاثين، وحمد الله ثلاثاً وثلاثين، وكبر الله ثلاثاً وثلاثين، وقال تمام المائة: لا إله إلا الله وحده لا شريك له، له الملك وله الحمد، وهو على كل شيء قدير، غفرت له ذنوبه وإن كانت مثل زبد البحر",
                maxCount: 33,
                currentCount: 0,
                favorite: false,
                reward: "مغفرة الذنوب"
            },
            {
                id: 25,
                category: "بعد الصلاة",
                title: "الْحَمْدُ لِلَّهِ",
                text: "الْحَمْدُ لِلَّهِ",
                translation: "الحمد لله",
                benefit: "انظر الذكر السابق",
                maxCount: 33,
                currentCount: 0,
                favorite: false,
                reward: "انظر الذكر السابق"
            },
            {
                id: 26,
                category: "بعد الصلاة",
                title: "اللَّهُ أَكْبَرُ",
                text: "اللَّهُ أَكْبَرُ",
                translation: "الله أكبر",
                benefit: "انظر الذكر السابق",
                maxCount: 34,
                currentCount: 0,
                favorite: false,
                reward: "انظر الذكر السابق"
            },
            {
                id: 27,
                category: "بعد الصلاة",
                title: "آية الكرسي",
                text: "آية الكرسي كاملة",
                translation: "آية الكرسي كاملة",
                benefit: "من قرأها بعد كل صلاة لم يمنعه من دخول الجنة إلا الموت",
                maxCount: 1,
                currentCount: 0,
                favorite: true,
                reward: "دخول الجنة"
            },
            {
                id: 28,
                category: "بعد الصلاة",
                title: "سورة الإخلاص",
                text: "قُلْ هُوَ اللَّهُ أَحَدٌ، اللَّهُ الصَّمَدُ، لَمْ يَلِدْ وَلَمْ يُولَدْ، وَلَمْ يَكُنْ لَهُ كُفُوًا أَحَدٌ",
                translation: "قل هو الله أحد، الله الصمد، لم يلد ولم يولد، ولم يكن له كفواً أحد",
                benefit: "من قرأها بعد كل صلاة مرة واحدة خرج من ذنوبه كيوم ولدته أمه",
                maxCount: 3,
                currentCount: 0,
                favorite: false,
                reward: "مغفرة الذنوب"
            },
            {
                id: 29,
                category: "بعد الصلاة",
                title: "سورة الفلق",
                text: "قُلْ أَعُوذُ بِرَبِّ الْفَلَقِ، مِنْ شَرِّ مَا خَلَقَ، وَمِنْ شَرِّ غَاسِقٍ إِذَا وَقَبَ، وَمِنْ شَرِّ النَّفَّاثَاتِ فِي الْعُقَدِ، وَمِنْ شَرِّ حَاسِدٍ إِذَا حَسَدَ",
                translation: "قل أعوذ برب الفلق، من شر ما خلق، ومن شر غاسق إذا وقب، ومن شر النفاثات في العقد، ومن شر حاسد إذا حسد",
                benefit: "من قرأها بعد كل صلاة لم تضره العين ولا السحر",
                maxCount: 3,
                currentCount: 0,
                favorite: false,
                reward: "التحصين من العين والسحر"
            },
            {
                id: 30,
                category: "بعد الصلاة",
                title: "سورة الناس",
                text: "قُلْ أَعُوذُ بِرَبِّ النَّاسِ، مَلِكِ النَّاسِ، إِلَهِ النَّاسِ، مِنْ شَرِّ الْوَسْوَاسِ الْخَنَّاسِ، الَّذِي يُوَسْوِسُ فِي صُدُورِ النَّاسِ، مِنَ الْجِنَّةِ وَالنَّاسِ",
                translation: "قل أعوذ برب الناس، ملك الناس، إله الناس، من شر الوسواس الخناس، الذي يوسوس في صدور الناس، من الجنة والناس",
                benefit: "من قرأها بعد كل صلاة لم تضره العين ولا السحر",
                maxCount: 3,
                currentCount: 0,
                favorite: false,
                reward: "التحصين من العين والسحر"
            },
            {
                id: 31,
                category: "النوم",
                title: "بِاسْمِكَ رَبِّي وَضَعْتُ جَنْبِي",
                text: "بِاسْمِكَ رَبِّي وَضَعْتُ جَنْبِي، وَبِكَ أَرْفَعُهُ، إِنْ أَمْسَكْتَ نَفْسِي فَاغْفِرْ لَهَا، وَإِنْ أَرْسَلْتَهَا ف_احْفَظْهَا بِمَا تَحْفَظُ بِهِ عِبَادَكَ الصَّالِحِينَ",
                translation: "باسمك ربي وضعت جنبي، وبك أرفعه، إن أمسكت نفسي فاغفر لها، وإن أرسلتها فاحفظها بما تحفظ به عبادك الصالحين",
                benefit: "من قالها عند نومه فمات وهو نائم مات على الفطرة",
                maxCount: 1,
                currentCount: 0,
                favorite: true,
                reward: "الموت على الفطرة"
            },
            {
                id: 32,
                category: "النوم",
                title: "اللَّهُمَّ قِنِي عَذَابَكَ يَوْمَ تَبْعَثُ عِبَادَكَ",
                text: "اللَّهُمَّ قِنِي عَذَابَكَ يَوْمَ تَبْعَثُ عِبَادَكَ",
                translation: "اللهم قني عذابك يوم تبعث عبادك",
                benefit: "من قالها ثلاثاً عند نومه وكَّل الله به ملكاً يحفظه حتى يصبح",
                maxCount: 3,
                currentCount: 0,
                favorite: false,
                reward: "حفظ الملك"
            },
            {
                id: 33,
                category: "النوم",
                title: "بِاسْمِكَ اللَّهُمَّ أَمُوتُ وَأَحْيَا",
                text: "بِاسْمِكَ اللَّهُمَّ أَمُوتُ وَأَحْيَا",
                translation: "باسمك اللهم أموت وأحيا",
                benefit: "من قالها عند نومه ثم مات مات على الفطرة",
                maxCount: 1,
                currentCount: 0,
                favorite: false,
                reward: "الموت على الفطرة"
            },
            {
                id: 34,
                category: "النوم",
                title: "الْحَمْدُ لِلَّهِ الَّذِي أَطْعَمَنَا وَسَقَانَا",
                text: "الْحَمْدُ لِلَّهِ الَّذِي أ_طْعَمَنَا وَسَقَانَا، وَكَفَانَا، وَآوَانَا، فَكَمْ مِمَّنْ لَا كَافِيَ لَهُ وَلَا مُؤْوِي",
                translation: "الحمد لله الذي أطعمنا وسقانا، وكفانا، وآوانا، فكم ممن لا كافي له ولا مأوى",
                benefit: "من قالها عند نومه شكر الله على نعمه",
                maxCount: 1,
                currentCount: 0,
                favorite: false,
                reward: "شكر النعم"
            },
            {
                id: 35,
                category: "النوم",
                title: "اللَّهُمَّ أَسْلَمْتُ نَفْسِي إِلَيْكَ",
                text: "اللَّهُمَّ أَسْلَمْتُ نَفْسِي إِلَيْكَ، وَوَجَّهْتُ وَجْهِي إِلَيْكَ، وَفَوَّضْتُ أَمْرِي إِلَيْكَ، وَأَلْجَأْتُ ظَهْرِي إِلَيْكَ، رَغْبَةً وَرَهْبَةً إِلَيْكَ، لَا مَلْجَأَ وَلَا مَنْجَا مِنْكَ إِلَّا إِلَيْكَ، آمَنْتُ بِكِتَابِكَ الَّذِي أَنْزَلْتَ، وَبِنَبِيِّكَ الَّذِي أَرْسَلْتَ",
                translation: "اللهم أسلمت نفسي إليك، ووجهت وجهي إليك، وفوضت أمري إليك، وألجأت ظهري إليك، رغبة ورهبة إليك، لا ملجأ ولا منجا منك إلا إليك، آمنت بكتابك الذي أنزلت، وبنبيك الذي أرسلت",
                benefit: "من قالها عند نومه ثم مات مات على الفطرة",
                maxCount: 1,
                currentCount: 0,
                favorite: true,
                reward: "الموت على الفطرة"
            },
            {
                id: 36,
                category: "النوم",
                title: "آية الكرسي",
                text: "آية الكرسي كاملة",
                translation: "آية الكرسي كاملة",
                benefit: "من قرأها عند النوم يحفظه الله ولا يقربه شيطان حتى يصبح",
                maxCount: 1,
                currentCount: 0,
                favorite: true,
                reward: "حفظ من الشيطان"
            },
            {
                id: 37,
                category: "النوم",
                title: "الْمُعَوِّذَاتِ",
                text: "قُلْ هُوَ اللَّهُ أَحَدٌ، وَقُلْ أَعُوذُ بِرَبِّ الْفَلَقِ، وَقُلْ أَعُوذُ بِرَبِّ النَّاسِ",
                translation: "سورة الإخلاص، وسورة الفلق، وسورة الناس",
                benefit: "من قرأها عند النوم ثلاث مرات كفته من كل شيء",
                maxCount: 3,
                currentCount: 0,
                favorite: true,
                reward: "الكفاية من كل شيء"
            },
            {
                id: 38,
                category: "النوم",
                title: "سُبْحَانَ اللَّهِ",
                text: "سُبْحَانَ اللَّهِ",
                translation: "سبحان الله",
                benefit: "من قالها ثلاثاً وثلاثين مرة عند النوم غفرت له ذنوبه ولو كانت مثل زبد البحر",
                maxCount: 33,
                currentCount: 0,
                favorite: false,
                reward: "مغفرة الذنوب"
            },
            {
                id: 39,
                category: "النوم",
                title: "الْحَمْدُ لِلَّهِ",
                text: "الْحَمْدُ لِلَّهِ",
                translation: "الحمد لله",
                benefit: "انظر الذكر السابق",
                maxCount: 33,
                currentCount: 0,
                favorite: false,
                reward: "انظر الذكر السابق"
            },
            {
                id: 40,
                category: "النوم",
                title: "اللَّهُ أَكْبَرُ",
                text: "اللَّهُ أَكْبَرُ",
                translation: "الله أكبر",
                benefit: "انظر الذكر السابق",
                maxCount: 34,
                currentCount: 0,
                favorite: false,
                reward: "انظر الذكر السابق"
            },
            {
                id: 41,
                category: "عامة",
                title: "سُبْحَانَ اللَّهِ وَالْحَمْدُ لِلَّهِ",
                text: "سُبْحَانَ اللَّهِ وَالْحَمْدُ لِلَّهِ وَلاَ إِلَهَ إِلاَّ اللَّهُ وَاللَّهُ أَكْبَرُ",
                translation: "سبحان الله والحمد لله ولا إله إلا الله والله أكبر",
                benefit: "حببتان إلى الرحمن، تقال في كل وقت وحين",
                maxCount: 10,
                currentCount: 0,
                favorite: false,
                reward: "حببتان إلى الرحمن"
            },
            {
                id: 42,
                category: "عامة",
                title: "لَا حَوْلَ وَلَا قُوَّةَ إِلَّا بِاللَّهِ",
                text: "لَا حَوْلَ وَلَا قُوَّةَ إِلَّا بِاللَّهِ",
                translation: "لا حول ولا قوة إلا بالله",
                benefit: "كنز من كنوز الجنة",
                maxCount: 100,
                currentCount: 0,
                favorite: true,
                reward: "كنز من كنوز الجنة"
            },
            {
                id: 43,
                category: "عامة",
                title: "اللَّهُمَّ صَلِّ عَلَى مُحَمَّدٍ",
                text: "اللَّهُمَّ صَلِّ عَلَى مُحَمَّدٍ وَعَلَى آلِ مُحَمَّدٍ، كَمَا صَلَّيْتَ عَلَى إِبْرَاهِيمَ وَعَلَى آلِ إِبْرَاهِيمَ، إِنَّكَ حَمِيدٌ مَجِيدٌ، اللَّهُمَّ بَارِكْ عَلَى مُحَمَّدٍ وَعَلَى آلِ مُحَمَّدٍ، كَمَا ب_ارَكْتَ عَلَى إِبْرَاهِيمَ وَعَلَى آلِ إِبْرَاهِيمَ، إِنَّكَ حَمِيدٌ مَجِيدٌ",
                translation: "اللهم صل على محمد وعلى آل محمد، كما صليت على إبراهيم وعلى آل إبراهيم، إنك حميد مجيد، اللهم بارك على محمد وعلى آل محمد، كما باركت على إبراهيم وعلى آل إبراهيم، إنك حميد مجيد",
                benefit: "من صلى على النبي صلى الله عليه وسلم مرة صلى الله عليه بها عشراً",
                maxCount: 10,
                currentCount: 0,
                favorite: true,
                reward: "الصلاة من الله 10 مرات"
            },
            {
                id: 44,
                category: "عامة",
                title: "سُبْحَانَ اللَّهِ وَبِحَمْدِهِ",
                text: "سُبْحَانَ اللَّهِ وَبِحَمْدِهِ، سُبْحَانَ اللَّهِ الْعَظِيمِ",
                translation: "سبحان الله وبحمده، سبحان الله العظيم",
                benefit: "كلمتان خفيفتان على اللسان، ثقيلتان في الميزان، حبيبتان إلى الرحمن",
                maxCount: 100,
                currentCount: 0,
                favorite: false,
                reward: "ثقيلتان في الميزان"
            },
            {
                id: 45,
                category: "عامة",
                title: "لَا إِلَهَ إِلَّا أَنْتَ سُبْحَانَكَ",
                text: "لَا إِلَهَ إِلَّا أَنْتَ سُبْحَانَكَ إِنِّي كُنْتُ مِنَ الظَّالِمِينَ",
                translation: "لا إله إلا أنت سبحانك إني كنت من الظالمين",
                benefit: "دعاء ذي النون لما كان في بطن الحوت، لا يدعو به مسلم في شيء إلا استجاب الله له",
                maxCount: 100,
                currentCount: 0,
                favorite: true,
                reward: "استجابة الدعاء"
            },
            {
                id: 46,
                category: "عامة",
                title: "سُبْحَانَ اللَّهِ",
                text: "سُبْحَانَ اللَّهِ",
                translation: "سبحان الله",
                benefit: "من قالها مائة مرة في اليوم غفرت له ذنوبه ولو كانت مثل زبد البحر",
                maxCount: 100,
                currentCount: 0,
                favorite: false,
                reward: "مغفرة الذنوب"
            },
            {
                id: 47,
                category: "عامة",
                title: "الْحَمْدُ لِلَّهِ",
                text: "الْحَمْدُ لِلَّهِ",
                translation: "الحمد لله",
                benefit: "تملأ ميزان العبد بالحسنات",
                maxCount: 100,
                currentCount: 0,
                favorite: false,
                reward: "تملأ الميزان"
            },
            {
                id: 48,
                category: "عامة",
                title: "اللَّهُ أَكْبَرُ",
                text: "اللَّهُ أَكْبَرُ",
                translation: "الله أكبر",
                benefit: "تملأ ما بين السماوات والأرض",
                maxCount: 100,
                currentCount: 0,
                favorite: false,
                reward: "تملأ ما بين السماوات والأرض"
            },
            {
                id: 49,
                category: "عامة",
                title: "لَا إِلَهَ إِلَّا اللَّهُ",
                text: "لَا إِلَهَ إِلَّا اللَّهُ",
                translation: "لا إله إلا الله",
                benefit: "أفضل الذكر",
                maxCount: 100,
                currentCount: 0,
                favorite: true,
                reward: "أفضل الذكر"
            },
            {
                id: 50,
                category: "عامة",
                title: "اللَّهُمَّ إِنِّي أَسْأَلُكَ الْجَنَّةَ",
                text: "اللَّهُمَّ إِنِّي أَسْأَلُكَ الْجَنَّةَ وَأَعُوذُ بِكَ مِنَ النَّارِ",
                translation: "اللهم إني أسألك الجنة وأعوذ بك من النار",
                benefit: "من سأل الله الجنة ثلاثاً قالت الجنة: اللهم أدخله الجنة، ومن استجار من النار ثلاثاً قالت النار: اللهم أجره من النار",
                maxCount: 3,
                currentCount: 0,
                favorite: true,
                reward: "سؤال الجنة والاستعاذة من النار"
            }
        ];

        // عناصر DOM
        let totalCount = 0;
        const azkarContainer = document.getElementById('azkarContainer');
        const totalCountElement = document.getElementById('totalCount');
        const resetAllButton = document.getElementById('resetAll');
        const categoryNav = document.getElementById('categoryNav');
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');
        const noResults = document.getElementById('noResults');
        const shareBtn = document.getElementById('shareBtn');

        // عناصر الإحصائيات
        const statTotal = document.getElementById('statTotal');
        const statCompleted = document.getElementById('statCompleted');
        const statProgress = document.getElementById('statProgress');
        const statFavorites = document.getElementById('statFavorites');

        // جميع التصنيفات
        const categories = [
            { id: "all", name: "الكل", icon: "bi-grid" },
            { id: "morning", name: "الصباح", icon: "bi-sun" },
            { id: "evening", name: "المساء", icon: "bi-moon" },
            { id: "after-prayer", name: "بعد الصلاة", icon: "bi-clock" },
            { id: "sleep", name: "النوم", icon: "bi-moon-stars" },
            { id: "general", name: "عامة", icon: "bi-star" },
            { id: "favorites", name: "المفضلة", icon: "bi-heart" }
        ];

        // المتغيرات الحالية
        let currentCategory = "all";
        let currentSearchTerm = "";

        // دالة لتحميل الأذكار
        function loadAzkar() {
            azkarContainer.innerHTML = '';
            noResults.classList.add('d-none');

            // فلترة الأذكار حسب التصنيف والبحث
            let filteredAzkar = azkar;

            // التصفية حسب التصنيف
            if (currentCategory !== "all") {
                if (currentCategory === "favorites") {
                    filteredAzkar = azkar.filter(z => z.favorite);
                } else {
                    const categoryMap = {
                        "morning": "الصباح",
                        "evening": "المساء",
                        "after-prayer": "بعد الصلاة",
                        "sleep": "النوم",
                        "general": "عامة"
                    };
                    filteredAzkar = azkar.filter(z => z.category === categoryMap[currentCategory]);
                }
            }

            // التصفية حسب البحث
            if (currentSearchTerm.trim() !== "") {
                const term = currentSearchTerm.toLowerCase();
                filteredAzkar = filteredAzkar.filter(z =>
                    z.title.toLowerCase().includes(term) ||
                    z.text.toLowerCase().includes(term) ||
                    z.translation.toLowerCase().includes(term) ||
                    z.benefit.toLowerCase().includes(term) ||
                    z.reward.toLowerCase().includes(term)
                );
            }

            // حساب المجموع الكلي
            totalCount = azkar.reduce((sum, zikr) => sum + zikr.currentCount, 0);
            totalCountElement.textContent = totalCount;

            // تحديث الإحصائيات
            updateStatistics();

            // إذا لم توجد نتائج
            if (filteredAzkar.length === 0) {
                noResults.classList.remove('d-none');
                return;
            }

            // إنشاء بطاقات الأذكار
            filteredAzkar.forEach(zikr => {
                const progressPercent = zikr.maxCount > 0 ? (zikr.currentCount / zikr.maxCount) * 100 : 0;
                const isCompleted = zikr.maxCount > 0 && zikr.currentCount >= zikr.maxCount;

                const card = document.createElement('div');
                card.className = 'zikr-card fade-in';
                card.innerHTML = `
                    <div class="zikr-card-header">
                        <div class="zikr-card-id">${zikr.id}</div>
                        <div class="zikr-card-title">${zikr.title}</div>
                        <div class="zikr-card-category">${zikr.category}</div>
                        ${isCompleted ? '<div class="completion-badge"><i class="bi bi-check-lg"></i></div>' : ''}
                        <div class="reward-badge">${zikr.reward}</div>
                    </div>
                    <div class="zikr-card-body">
                        <div class="zikr-text-container">
                            <div class="arabic-text">${zikr.text}</div>
                            <div class="zikr-translation">${zikr.translation}</div>
                            <div class="zikr-benefit">
                                <i class="bi bi-award me-1"></i>${zikr.benefit}
                            </div>
                        </div>
                        
                        <div class="counter-section">
                            <div class="counter-display">
                                <div class="counter-number" id="count-${zikr.id}">${zikr.currentCount}</div>
                                <div class="counter-total">من ${zikr.maxCount > 0 ? zikr.maxCount : '∞'}</div>
                            </div>
                            
                            <div class="progress-container">
                                <div class="progress">
                                    <div id="progress-${zikr.id}" class="progress-bar" role="progressbar" 
                                         style="width: ${progressPercent}%" 
                                         aria-valuenow="${zikr.currentCount}" 
                                         aria-valuemin="0" 
                                         aria-valuemax="${zikr.maxCount}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="counter-buttons">
                                <button class="counter-btn btn-decrement" onclick="decrementCount(${zikr.id})">
                                    <i class="bi bi-dash-lg"></i>
                                </button>
                                
                                <button class="counter-btn btn-increment" onclick="incrementCount(${zikr.id})">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                                
                                <button class="btn btn-reset" onclick="resetCount(${zikr.id})">
                                    <i class="bi bi-arrow-clockwise me-1"></i>إعادة
                                </button>
                                
                                <button class="btn btn-favorite ${zikr.favorite ? 'active' : ''}" onclick="toggleFavorite(${zikr.id})">
                                    <i class="bi ${zikr.favorite ? 'bi-heart-fill' : 'bi-heart'} me-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;

                azkarContainer.appendChild(card);
            });
        }

        // دالة لإنشاء أزرار التصنيفات
        function createCategoryButtons() {
            categoryNav.innerHTML = '';

            categories.forEach(category => {
                const button = document.createElement('button');
                button.className = `category-btn ${category.id === currentCategory ? 'active' : ''}`;
                button.innerHTML = `
                    <i class="bi ${category.icon} me-1"></i>${category.name}
                `;
                button.onclick = () => switchCategory(category.id);
                categoryNav.appendChild(button);
            });
        }

        // دالة للتبديل بين التصنيفات
        function switchCategory(categoryId) {
            currentCategory = categoryId;
            createCategoryButtons();
            loadAzkar();
        }

        // دالة لزيادة العداد
        function incrementCount(id) {
            const zikr = azkar.find(z => z.id === id);
            if (zikr.maxCount === 0 || zikr.currentCount < zikr.maxCount) {
                zikr.currentCount++;
                updateCount(id);
                saveToLocalStorage();
            }
        }

        // دالة لإنقاص العداد
        function decrementCount(id) {
            const zikr = azkar.find(z => z.id === id);
            if (zikr.currentCount > 0) {
                zikr.currentCount--;
                updateCount(id);
                saveToLocalStorage();
            }
        }

        // دالة لإعادة تعيين العداد
        function resetCount(id) {
            const zikr = azkar.find(z => z.id === id);
            zikr.currentCount = 0;
            updateCount(id);
            saveToLocalStorage();
        }

        // دالة لتحديث العداد والشريط
        function updateCount(id) {
            const zikr = azkar.find(z => z.id === id);
            const countElement = document.getElementById(`count-${id}`);
            const progressElement = document.getElementById(`progress-${id}`);
            const cardElement = document.querySelector(`.zikr-card:has(#count-${id})`);

            if (countElement) countElement.textContent = zikr.currentCount;

            const progressPercent = zikr.maxCount > 0 ? (zikr.currentCount / zikr.maxCount) * 100 : 0;
            if (progressElement) progressElement.style.width = `${progressPercent}%`;

            // تحديث حالة الإكمال
            if (cardElement) {
                const isCompleted = zikr.maxCount > 0 && zikr.currentCount >= zikr.maxCount;
                const badge = cardElement.querySelector('.completion-badge');

                if (isCompleted && !badge) {
                    const newBadge = document.createElement('div');
                    newBadge.className = 'completion-badge';
                    newBadge.innerHTML = '<i class="bi bi-check-lg"></i>';
                    cardElement.querySelector('.zikr-card-header').appendChild(newBadge);

                    // إضافة تأثير مرئي للإكمال
                    cardElement.style.boxShadow = '0 15px 40px rgba(16, 185, 129, 0.3)';
                    setTimeout(() => {
                        cardElement.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.08)';
                    }, 1000);
                } else if (!isCompleted && badge) {
                    badge.remove();
                }
            }

            // تحديث المجموع الكلي والإحصائيات
            totalCount = azkar.reduce((sum, z) => sum + z.currentCount, 0);
            totalCountElement.textContent = totalCount;
            updateStatistics();
        }

        // دالة لتحديث الإحصائيات
        function updateStatistics() {
            // إجمالي الأذكار
            statTotal.textContent = azkar.length;

            // الأذكار المكتملة اليوم
            const completedToday = azkar.filter(z => z.maxCount > 0 && z.currentCount >= z.maxCount).length;
            statCompleted.textContent = completedToday;

            // نسبة الإنجاز
            const totalPossible = azkar.filter(z => z.maxCount > 0).reduce((sum, z) => sum + z.maxCount, 0);
            const totalCurrent = azkar.reduce((sum, z) => sum + z.currentCount, 0);
            const progressPercent = totalPossible > 0 ? Math.round((totalCurrent / totalPossible) * 100) : 0;
            statProgress.textContent = `${progressPercent}%`;

            // تحديث شريط التقدم في المجموع الكلي
            const totalProgress = Math.min(100, (totalCurrent / 1000) * 100); // افتراضي 1000 كحد أقصى
            document.querySelector('.total-counter-card').style.background =
                `linear-gradient(135deg, white 0%, #f8fafc 100%), 
                 linear-gradient(to right, rgba(37, 99, 235, 0.1) ${totalProgress}%, transparent ${totalProgress}%)`;

            // عدد المفضلة
            const favoritesCount = azkar.filter(z => z.favorite).length;
            statFavorites.textContent = favoritesCount;
        }

        // دالة لإضافة/إزالة من المفضلة
        function toggleFavorite(id) {
            const zikr = azkar.find(z => z.id === id);
            zikr.favorite = !zikr.favorite;

            // تحديث الزر في الواجهة
            const favoriteButton = document.querySelector(`button[onclick="toggleFavorite(${id})"]`);
            if (favoriteButton) {
                favoriteButton.classList.toggle('active');
                const icon = favoriteButton.querySelector('i');
                icon.classList.toggle('bi-heart-fill');
                icon.classList.toggle('bi-heart');

                // تأثير عند الإضافة للمفضلة
                if (zikr.favorite) {
                    favoriteButton.style.transform = 'scale(1.1)';
                    setTimeout(() => {
                        favoriteButton.style.transform = '';
                    }, 300);
                }
            }

            // إذا كنا في قسم المفضلة، أعد تحميل القائمة
            if (currentCategory === "favorites") {
                loadAzkar();
            }

            saveToLocalStorage();
            updateStatistics();
        }

        // دالة لحفظ البيانات في localStorage
        function saveToLocalStorage() {
            const dataToSave = azkar.map(z => ({
                id: z.id,
                currentCount: z.currentCount,
                favorite: z.favorite
            }));
            localStorage.setItem('azkarData', JSON.stringify(dataToSave));
            localStorage.setItem('totalCount', totalCount.toString());
        }

        // دالة لتحميل البيانات من localStorage
        function loadFromLocalStorage() {
            const savedData = localStorage.getItem('azkarData');
            const savedTotal = localStorage.getItem('totalCount');

            if (savedData) {
                const parsedData = JSON.parse(savedData);
                parsedData.forEach(savedZikr => {
                    const zikr = azkar.find(z => z.id === savedZikr.id);
                    if (zikr) {
                        zikr.currentCount = savedZikr.currentCount || 0;
                        zikr.favorite = savedZikr.favorite || false;
                    }
                });
            }

            if (savedTotal) {
                totalCount = parseInt(savedTotal);
            }
        }

        // البحث في الأذكار
        searchButton.addEventListener('click', function () {
            currentSearchTerm = searchInput.value.trim();
            loadAzkar();
        });

        // البحث عند الضغط على Enter
        searchInput.addEventListener('keyup', function (event) {
            if (event.key === 'Enter') {
                currentSearchTerm = searchInput.value.trim();
                loadAzkar();
            }
        });

        // إعادة تعيين جميع العدادات
        resetAllButton.addEventListener('click', function () {
            if (confirm("هل تريد إعادة تعيين جميع العدادات؟ سيتم مسح جميع إحصاءاتك اليومية.")) {
                azkar.forEach(zikr => {
                    zikr.currentCount = 0;
                });
                loadAzkar();
                saveToLocalStorage();

                // تأثير مرئي
                resetAllButton.innerHTML = '<i class="bi bi-check-lg me-2"></i>تم الإعادة';
                resetAllButton.classList.remove('btn-outline-light');
                resetAllButton.classList.add('btn-success');

                setTimeout(() => {
                    resetAllButton.innerHTML = '<i class="bi bi-arrow-clockwise me-2"></i>إعادة تعيين الكل';
                    resetAllButton.classList.remove('btn-success');
                    resetAllButton.classList.add('btn-outline-light');
                }, 2000);
            }
        });

        // زر المشاركة
        shareBtn.addEventListener('click', function () {
            if (navigator.share) {
                navigator.share({
                    title: 'موسوعة الأذكار مع عداد',
                    text: `لقد رفعت ${totalCount} ذكراً اليوم! انضم إلي في رفع الحسنات`,
                    url: window.location.href
                });
            } else {
                // نسخ الرابط
                navigator.clipboard.writeText(window.location.href);
                shareBtn.innerHTML = '<i class="bi bi-check-lg"></i>';
                shareBtn.style.background = 'linear-gradient(135deg, #10b981, #34d399)';

                setTimeout(() => {
                    shareBtn.innerHTML = '<i class="bi bi-share-fill"></i>';
                    shareBtn.style.background = 'linear-gradient(135deg, var(--primary-color), var(--primary-light))';
                }, 2000);
            }
        });

        // تعيين سنة التذييل الحالية
        document.getElementById('currentYear').textContent = new Date().getFullYear();

        // تهيئة التطبيق
        function initApp() {
            loadFromLocalStorage();
            createCategoryButtons();
            loadAzkar();

            // تحميل خط عربي محسن إذا كان متاحاً
            const link = document.createElement('link');
            link.href = 'https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Lateef&display=swap';
            link.rel = 'stylesheet';
            document.head.appendChild(link);
        }

        // بدء التطبيق عند تحميل الصفحة
        document.addEventListener('DOMContentLoaded', initApp);
    </script>
</body>

</html>