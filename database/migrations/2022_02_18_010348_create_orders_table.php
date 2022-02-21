<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_number')->nullable();
            $table->string('PO_No')->nullable();
            $table->string('POL')->nullable();
            $table->string('POD')->nullable();
            $table->string('ramp_via')->nullable();
            $table->string('size')->nullable();
            $table->string('carrier')->nullable();
            $table->string('vessel_voyage')->nullable();
            $table->string('container')->nullable();
            $table->string('seal')->nullable();
            $table->string('cargo_weight')->nullable();
            $table->string('quantity')->nullable();
            $table->string('MBL')->nullable();
            $table->string('HBL')->nullable();
            $table->string('Commodity')->nullable();
            $table->date('cut_of_date')->nullable();
            $table->date('on_board_date')->nullable();
            $table->date('eta_port_date')->nullable();
            $table->date('eta_ramp_date')->nullable();
            $table->string('freight_quote')->nullable();
            $table->string('exw_local')->nullable();
            $table->string('wharfage')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('note')->nullable();
            $table->unsignedBigInteger('consignee_id')->nullable();
            $table->unsignedBigInteger('consignee_contact_id')->nullable();
            $table->unsignedBigInteger('shipper_id')->nullable();
            $table->unsignedBigInteger('shipper_contact_id')->nullable(); 
             $table->unsignedBigInteger('party_id')->nullable();
            $table->unsignedBigInteger('party_contact_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('consignee_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('shipper_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('consignee_contact_id')
                ->references('id')
                ->on('user_contacts')
                ->onDelete('cascade');

            $table->foreign('shipper_contact_id')
                ->references('id')
                ->on('user_contacts')
                ->onDelete('cascade');

            $table->foreign('party_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('party_contact_id')
                ->references('id')
                ->on('user_contacts')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
