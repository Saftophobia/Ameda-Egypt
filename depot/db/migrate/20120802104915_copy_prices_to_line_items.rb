class CopyPricesToLineItems < ActiveRecord::Migration
  def up
  	    LineItem.all.each do |item|
  			item.price = item.product.price
  			item.save
  		end
  end

end
