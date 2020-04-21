<?php

use Phinx\Migration\AbstractMigration;

class CreateProducts extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('products', [
            'collation' => 'utf8mb4_unicode_ci',
            'comment' => '商品'
        ]);
        $table->addColumn('type', 'string', [
            'null' => false,
            'limit' => 32,
            'comment' => '商品種別',
        ]);
        $table->addColumn('name', 'string', [
            'null' => false,
            'limit' => 255,
            'comment' => '商品名',
        ]);
        $table->addColumn('price_excluding_tax', 'integer', [
            'null' => false,
            'comment' => '税抜き価格',
        ]);
        $table->addColumn('start_selling_at', 'datetime', [
            'null' => false,
            'default' => null,
            'comment' => '販売開始日時',
        ]);
        $table->addColumn('end_of_sale_at', 'datetime', [
            'null' => false,
            'default' => null,
            'comment' => '販売終了日時',
        ]);
        $table->addColumn('can_order', 'boolean', [
            'null' => false,
            'default' => false,
            'comment' => '発注可能',
        ]);
        $table->addColumn('quantity_per_lot', 'integer', [
            'null' => false,
            'comment' => '１ロットあたりの数量',
        ]);
        $table->addColumn('min_order_lot_quantity', 'integer', [
            'null' => false,
            'comment' => '発注時の最低ロット数',
        ]);
        // 共通カラム
        $table->addColumn('created', 'datetime', [
            'null' => false,
            'default' => null,
            'comment' => '作成日時',
        ]);
        $table->addColumn('modified', 'datetime', [
            'null' => false,
            'default' => null,
            'comment' => '更新日時',
        ]);
        $table->create();
    }

    public function down()
    {
        $this->table('products')->drop()->save();
    }
}
