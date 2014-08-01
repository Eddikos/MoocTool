class CreateFriendships < ActiveRecord::Migration
  def change
    create_table :friendships do |t|
      t.references :user
      t.integer :friend_id
      t.integer :mutual_friendship_id
      t.timestamps
    end

    add_column :users, :friends_count, :integer, default: 0
  end
end
