<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Thana;
use App\Models\Location;
use App\Models\Customer;
use App\Models\Unit;
use App\Models\ExpenseType;
use App\Models\Expense;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with complete Bangla demo data.
     */
    public function run(): void
    {
        // 1. Create Main Admin User
        $user = User::updateOrCreate(
            ['email' => 'admin@anisstore.com'],
            [
                'name' => 'আনিস স্টোর এডমিন',
                'mobile' => '01792833747',
                'password' => Hash::make('12345678'),
                'otp' => '0',
                'status' => 'approved',
                'role' => 'admin',
            ]
        );

        // 2. Districts (পাবনা)
        $district = District::create([
            'district_name' => 'পাবনা',
            'status' => 'active',
            'user_id' => $user->id,
        ]);

        // 3. Upazila (পাবনা সদর)
        $upazila = Upazila::create([
            'upazila_name' => 'পাবনা সদর',
            'status' => 'active',
            'district_id' => $district->id,
            'user_id' => $user->id,
        ]);

        // 4. Thanas (পাবনা সদর থানা)
        $thana = Thana::create([
            'Thana_name' => 'পাবনা সদর থানা',
            'status' => 'active',
            'district_id' => $district->id,
            'upazila_id' => $upazila->id,
            'user_id' => $user->id,
        ]);

        // 5. Locations (ঝালাইপট্টি, পাবনা)
        $location = Location::create([
            'name' => 'ঝালাইপট্টি, পাবনা',
            'status' => 'active',
            'user_id' => $user->id,
        ]);

        // 6. Units (পরিমাপের একক)
        $unitPcs = Unit::create(['unit_name' => 'পিস', 'status' => 'active', 'user_id' => $user->id]);
        $unitGm = Unit::create(['unit_name' => 'গ্রাম', 'status' => 'active', 'user_id' => $user->id]);
        $unitMl = Unit::create(['unit_name' => 'এমএল', 'status' => 'active', 'user_id' => $user->id]);
        $unitKg = Unit::create(['unit_name' => 'কেজি', 'status' => 'active', 'user_id' => $user->id]);
        $unitPkt = Unit::create(['unit_name' => 'প্যাকেট', 'status' => 'active', 'user_id' => $user->id]);

        // 7. Brands (ব্র্যান্ড)
        $brand1 = Brand::create(['name' => 'কেয়া', 'status' => 'active', 'user_id' => $user->id]);
        $brand2 = Brand::create(['name' => 'মেরিল', 'status' => 'active', 'user_id' => $user->id]);
        $brand3 = Brand::create(['name' => 'লাফজ', 'status' => 'active', 'user_id' => $user->id]);
        $brand4 = Brand::create(['name' => 'ইউনিলিভার', 'status' => 'active', 'user_id' => $user->id]);
        $brand5 = Brand::create(['name' => 'প্রাণ', 'status' => 'active', 'user_id' => $user->id]);
        $brand6 = Brand::create(['name' => 'রাঁধুনী', 'status' => 'active', 'user_id' => $user->id]);

        // 8. Categories (ক্যাটাগরি)
        $cat1 = Category::create(['category_name' => 'কসমেটিকস', 'status' => 'active', 'user_id' => $user->id]);
        $cat2 = Category::create(['category_name' => 'ব্যক্তিগত যত্ন', 'status' => 'active', 'user_id' => $user->id]);
        $cat3 = Category::create(['category_name' => 'মুদি পণ্য', 'status' => 'active', 'user_id' => $user->id]);
        $cat4 = Category::create(['category_name' => 'স্টেশনারি', 'status' => 'active', 'user_id' => $user->id]);

        // 9. SubCategories (সাব-ক্যাটাগরি)
        $subcat1 = SubCategory::create([
            'sub_category_name' => 'ফেস ওয়াশ',
            'status' => 'active',
            'category_id' => $cat1->id,
            'user_id' => $user->id,
        ]);
        $subcat2 = SubCategory::create([
            'sub_category_name' => 'সাবান',
            'status' => 'active',
            'category_id' => $cat2->id,
            'user_id' => $user->id,
        ]);
        $subcat3 = SubCategory::create([
            'sub_category_name' => 'শ্যাম্পু ও তেল',
            'status' => 'active',
            'category_id' => $cat2->id,
            'user_id' => $user->id,
        ]);
        $subcat4 = SubCategory::create([
            'sub_category_name' => 'রান্নার মসলা',
            'status' => 'active',
            'category_id' => $cat3->id,
            'user_id' => $user->id,
        ]);

        // 10. Products (পণ্য তালিকা)
        Product::create([
            'product_name' => 'মেরিল বিউটি সাবান ১০০ গ্রাম',
            'quantity' => '100',
            'cost_price' => '40',
            'sell_price' => '50',
            'status' => 'active',
            'product_code' => json_encode(['1111']),
            'brand_id' => $brand2->id,
            'category_id' => $cat2->id,
            'sub_category_id' => $subcat2->id,
            'unit_id' => $unitPcs->id,
            'user_id' => $user->id,
        ]);

        Product::create([
            'product_name' => 'লাফজ অর্গানিক ফেস ওয়াশ',
            'quantity' => '50',
            'cost_price' => '180',
            'sell_price' => '220',
            'status' => 'active',
            'product_code' => json_encode(['2222']),
            'brand_id' => $brand3->id,
            'category_id' => $cat1->id,
            'sub_category_id' => $subcat1->id,
            'unit_id' => $unitMl->id,
            'user_id' => $user->id,
        ]);

        Product::create([
            'product_name' => 'কেয়া লেমন ফেসওয়াশ ১০০ গ্রাম',
            'quantity' => '80',
            'cost_price' => '120',
            'sell_price' => '150',
            'status' => 'active',
            'product_code' => json_encode(['3333']),
            'brand_id' => $brand1->id,
            'category_id' => $cat1->id,
            'sub_category_id' => $subcat1->id,
            'unit_id' => $unitGm->id,
            'user_id' => $user->id,
        ]);

        Product::create([
            'product_name' => 'প্রাণ সরিষার তেল ১ লিটার',
            'quantity' => '40',
            'cost_price' => '320',
            'sell_price' => '360',
            'status' => 'active',
            'product_code' => json_encode(['4444']),
            'brand_id' => $brand5->id,
            'category_id' => $cat3->id,
            'sub_category_id' => $subcat3->id,
            'unit_id' => $unitPcs->id,
            'user_id' => $user->id,
        ]);

        Product::create([
            'product_name' => 'রাঁধুনী গুঁড়া হলুদ ২০০ গ্রাম',
            'quantity' => '60',
            'cost_price' => '85',
            'sell_price' => '105',
            'status' => 'active',
            'product_code' => json_encode(['5555']),
            'brand_id' => $brand6->id,
            'category_id' => $cat3->id,
            'sub_category_id' => $subcat4->id,
            'unit_id' => $unitPkt->id,
            'user_id' => $user->id,
        ]);

        Product::create([
            'product_name' => 'সানসিল্ক ব্ল্যাক শ্যাম্পু ১৮০ এমএল',
            'quantity' => '5', // Low Stock Item
            'cost_price' => '210',
            'sell_price' => '240',
            'status' => 'active',
            'product_code' => json_encode(['6666']),
            'brand_id' => $brand4->id,
            'category_id' => $cat2->id,
            'sub_category_id' => $subcat3->id,
            'unit_id' => $unitPcs->id,
            'user_id' => $user->id,
        ]);

        Product::create([
            'product_name' => 'প্যারাসুট নারিকেল তেল ২০০ এমএল',
            'quantity' => '0', // Out of Stock Item
            'cost_price' => '150',
            'sell_price' => '180',
            'status' => 'active',
            'product_code' => json_encode(['7777']),
            'brand_id' => $brand4->id,
            'category_id' => $cat2->id,
            'sub_category_id' => $subcat3->id,
            'unit_id' => $unitPcs->id,
            'user_id' => $user->id,
        ]);

        Product::create([
            'product_name' => 'অলিম্পিক এনার্জি বিস্কুট',
            'quantity' => '120',
            'cost_price' => '25',
            'sell_price' => '30',
            'status' => 'active',
            'product_code' => json_encode(['8888']),
            'brand_id' => $brand5->id,
            'category_id' => $cat3->id,
            'sub_category_id' => $subcat4->id,
            'unit_id' => $unitPkt->id,
            'user_id' => $user->id,
        ]);

        Product::create([
            'product_name' => 'ম্যাটাদোর আই-টপ কলম',
            'quantity' => '200',
            'cost_price' => '4',
            'sell_price' => '5',
            'status' => 'active',
            'product_code' => json_encode(['9999']),
            'brand_id' => $brand1->id,
            'category_id' => $cat4->id,
            'sub_category_id' => $subcat1->id,
            'unit_id' => $unitPcs->id,
            'user_id' => $user->id,
        ]);

        // 11. Suppliers (সরবরাহকারী)
        Supplier::create([
            'supplier_id' => 'SUP-0001',
            'name' => 'কেয়া কসমেটিকস লিমিটেড',
            'company' => 'কেয়া গ্রুপ',
            'mobile' => '01711451333',
            'address' => 'ঢাকা, বাংলাদেশ',
            'purchase_payable_amount' => '5000',
            'status' => 'active',
            'user_id' => $user->id,
        ]);

        Supplier::create([
            'supplier_id' => 'SUP-0002',
            'name' => 'ইউনিলিভার বাংলাদেশ',
            'company' => 'ইউনিলিভার লিঃ',
            'mobile' => '01811223344',
            'address' => 'তেজগাঁও, ঢাকা',
            'purchase_payable_amount' => '12000',
            'status' => 'active',
            'user_id' => $user->id,
        ]);

        // 12. Customers (গ্রাহক তালিকা)
        Customer::create([
            'customer_id' => 'CUST-0001',
            'customer_name' => 'রাকিব হাসান',
            'mobile' => '01711451222',
            'address_details' => 'মধুপুর, পাবনা',
            'nid' => '1234567890',
            'previous_due_amount' => '500',
            'district_id' => $district->id,
            'upazila_id' => $upazila->id,
            'thana_id' => $thana->id,
            'location_id' => $location->id,
            'user_id' => $user->id,
        ]);

        Customer::create([
            'customer_id' => 'CUST-0002',
            'customer_name' => 'সাকিব আহমেদ',
            'mobile' => '01812345678',
            'address_details' => 'আব্দুল হামিদ রোড, পাবনা',
            'nid' => '9876543210',
            'previous_due_amount' => '1200',
            'district_id' => $district->id,
            'upazila_id' => $upazila->id,
            'thana_id' => $thana->id,
            'location_id' => $location->id,
            'user_id' => $user->id,
        ]);

        // 13. Expense Types (খরচের প্রকার)
        $expType1 = ExpenseType::create(['type_name' => 'দোকান ভাড়া', 'status' => 'active', 'user_id' => $user->id]);
        $expType2 = ExpenseType::create(['type_name' => 'বিদ্যুৎ বিল', 'status' => 'active', 'user_id' => $user->id]);
        $expType3 = ExpenseType::create(['type_name' => 'স্টাফ বেতন', 'status' => 'active', 'user_id' => $user->id]);
        $expType4 = ExpenseType::create(['type_name' => 'পরিবহন খরচ', 'status' => 'active', 'user_id' => $user->id]);

        // 14. Expenses (খরচ তালিকা)
        Expense::create([
            'expense_type_id' => $expType1->id,
            'expense_amount' => 15000.00,
            'expense_details' => 'চলতি মাসের দোকান ভাড়া',
            'date' => date('Y-m-d'),
            'user_id' => $user->id,
        ]);

        Expense::create([
            'expense_type_id' => $expType2->id,
            'expense_amount' => 3500.00,
            'expense_details' => 'দোকানের বিদ্যুৎ বিল',
            'date' => date('Y-m-d'),
            'user_id' => $user->id,
        ]);
    }
}
