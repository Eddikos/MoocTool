class FriendshipController < ApplicationController
  before_filter :authenticate_user!

  def destroy
    @friendship = current_user.friendships.find_by!(id: params[:id])
    @friendship.destroy
  end
end
